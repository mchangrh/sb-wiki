<?php
wfLoadExtension( 'SemanticMediaWiki' );
# redis cache
$smwgMainCacheType = 'redis';
$smwgQueryResultCacheType = 'redis';
$wgObjectCaches['redis'] = [
    'class'                => 'RedisBagOStuff',
    'servers'              => [
        'redis:6379'
    ],
];
# memcache
require_once "/includes/memcache.php";
?>