<?php
# restrict editing
$wgGroupPermissions['*']['edit'] = false;
$wgGroupPermissions['*']['createaccount'] = false;
# Add VIP group
$wgGroupPermissions['vip']['edit'] = true;
$wgGroupPermissions['vip']['createpage'] = true;
$wgGroupPermissions['vip']['createaccount'] = true;
$wgGroupPermissions['vip']['autopatrol'] = true;
$wgGroupPermissions['vip']['editvipprotected'] = true;
# user css/ js
$wgAllowUserCss = true;
$wgAllowUserJs = true;
# VIP protection level
$wgRestrictionLevels[] = 'editvipprotected';
?>
