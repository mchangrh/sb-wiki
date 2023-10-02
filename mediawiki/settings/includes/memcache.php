<?php
# memcache
$wgMainCacheType = CACHE_MEMCACHED;
$wgMemCachedServers = [
    [ "memcached:11211", 1 ]
];
?>