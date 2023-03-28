<?php
/**
 * Remove new user accounts from the database
 * An new account is one which has been created within 1 day
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 *
 * @file
 * @ingroup Maintenance
 * @author Rob Church <robchur@gmail.com>
 * @author Michael Chang <michael@mchang.name>
 */
 
/* Fork of removeUnusedAccounts.php to remove all new users accounts */

use MediaWiki\MediaWikiServices;
use MediaWiki\User\UserIdentity;

require_once __DIR__ . '/Maintenance.php';

/**
 * Maintenance script that removes new user accounts from the database.
 *
 * @ingroup Maintenance
 */
class RemoveNewAccounts extends Maintenance {
	public function __construct() {
		parent::__construct();
		$this->addOption( 'delete', 'Actually delete the account' );
		$this->addOption( 'ignore-groups', 'List of comma-separated groups to exclude', false, true );
		$this->addOption( 'ignore-age', 'Skip accounts with age greater than N days', false, true );
	}

	public function execute() {
		$services = MediaWikiServices::getInstance();
		$userFactory = $services->getUserFactory();
		$userGroupManager = $services->getUserGroupManager();
		$this->output( "Remove new accounts\n\n" );

		# Do an initial scan for inactive accounts and report the result
		$this->output( "Checking for new user accounts...\n" );
		$delUser = [];
		$delActor = [];
		$dbr = $this->getDB( DB_REPLICA );
		$res = $dbr->select(
			[ 'user', 'actor' ],
			[ 'user_id', 'user_name', 'user_registration', 'actor_id' ],
			'',
			__METHOD__,
			[],
			[ 'actor' => [ 'LEFT JOIN', 'user_id = actor_user' ] ]
		);
		if ( $this->hasOption( 'ignore-groups' ) ) {
			$excludedGroups = explode( ',', $this->getOption( 'ignore-groups' ) );
		} else {
			$excludedGroups = [];
		}
		$age = $this->getOption( 'ignore-age', "1" );
		if ( !ctype_digit( $age ) ) {
			$this->fatalError( "Please put a valid positive integer on the --ignore-age parameter." );
		}
		$ageDays = 86400 * $age;
		foreach ( $res as $row ) {
			# Check the account, but ignore it if it's within a $excludedGroups
			# group or if it's created within the $ageDays seconds.
			$instance = $userFactory->newFromId( $row->user_id );
			if ( count(
				array_intersect( $userGroupManager->getUserEffectiveGroups( $instance ), $excludedGroups ) ) == 0
				&& wfTimestamp( TS_UNIX, $row->user_registration ) > wfTimestamp( TS_UNIX, time() - $ageDays )
			) {
				# new; print out the name and flag it
				$delUser[] = $row->user_id;
				if ( isset( $row->actor_id ) && $row->actor_id ) {
					$delActor[] = $row->actor_id;
				}
				$this->output( $row->user_name . "\n" );
			}
		}
		$count = count( $delUser );
		$this->output( "...found {$count}.\n" );

		# If required, go back and delete each marked account
		if ( $count > 0 && $this->hasOption( 'delete' ) ) {
			$this->output( "\nDeleting new accounts..." );
			$dbw = $this->getDB( DB_PRIMARY );
			$dbw->delete( 'user', [ 'user_id' => $delUser ], __METHOD__ );
			# Keep actor rows referenced from ipblocks
			$keep = $dbw->selectFieldValues(
				'ipblocks', 'ipb_by_actor', [ 'ipb_by_actor' => $delActor ], __METHOD__
			);
			$del = array_diff( $delActor, $keep );
			if ( $del ) {
				$dbw->delete( 'actor', [ 'actor_id' => $del ], __METHOD__ );
			}
			if ( $keep ) {
				$dbw->update( 'actor', [ 'actor_user' => null ], [ 'actor_id' => $keep ], __METHOD__ );
			}
			$dbw->delete( 'user_groups', [ 'ug_user' => $delUser ], __METHOD__ );
			$dbw->delete( 'user_former_groups', [ 'ufg_user' => $delUser ], __METHOD__ );
			$dbw->delete( 'user_properties', [ 'up_user' => $delUser ], __METHOD__ );
			$dbw->delete( 'logging', [ 'log_actor' => $delActor ], __METHOD__ );
			$dbw->delete( 'recentchanges', [ 'rc_actor' => $delActor ], __METHOD__ );
			$this->output( "done.\n" );
			# Update the site_stats.ss_users field
			$users = $dbw->selectField( 'user', 'COUNT(*)', [], __METHOD__ );
			$dbw->update(
				'site_stats',
				[ 'ss_users' => $users ],
				[ 'ss_row_id' => 1 ],
				__METHOD__
			);
		} elseif ( $count > 0 ) {
			$this->output( "\nRun the script again with --delete to remove them from the database.\n" );
		}
		$this->output( "\n" );
	}
}

$maintClass = RemoveNewAccounts::class;
require_once RUN_MAINTENANCE_IF_MAIN;