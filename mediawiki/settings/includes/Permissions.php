<?php
# restrict editing
$wgGroupPermissions['*']['edit'] = false;
$wgGroupPermissions['*']['createaccount'] = false;
# Add VIP Group
$wgGroupPermissions['vip']['edit'] = true;
$wgGroupPermissions['vip']['createpage'] = true;
$wgGroupPermissions['vip']['createaccount'] = true;
# user css/ js
$wgAllowUserCss = true;
$wgAllowUserJs = true;
?>