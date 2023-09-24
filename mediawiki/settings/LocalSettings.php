<?php
# originally from MW 1.36.1
# https://www.mediawiki.org/wiki/Manual:Configuration_settings

# Protect against web entry
if ( !defined( 'MEDIAWIKI' ) ) {
    exit;
}
# base directory path
$wgScriptPath = "";
# static resources path
$wgResourceBasePath = $wgScriptPath;
# article path
$wgArticlePath = "/w/$1";

# image uploads
$wgEnableUploads = true;
$wgUseImageMagick = true;
# pingback to wikidata
$wgPingback = true;
# site language code
$wgLanguageCode = "en-ca";

# database auth and settings
require_once "/secrets/mysql.php";
# secretKey, authenticationTokenVersion, upgradeKey
require_once "/secrets/keys.php";
# site name and logos
require_once "/includes/Branding.php";
require_once "/includes/Email.php";
require_once "/includes/Cache.php";
require_once "/includes/License.php";
require_once "/includes/Skins.php";
require_once "/includes/Extensions.php";
require_once "/includes/Permissions.php";
require_once "/includes/Namespaces.php";