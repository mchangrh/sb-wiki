<?php
wfLoadExtension( 'DumpsOnDemand' );

$wgDumpsOnDemandCompression = "gz";
# limit to 1 request/day
$wgDumpsOnDemandRequestLimit = 86400;
# grant permission to all
$wgGroupPermissions['*']['dumpsondemand'] = true;

$wgGroupPermissions['vip']['dumprequestlog'] = true;
$wgGroupPermissions['vip']['dumpsondemand-limit-exempt'] = true;
# job run rate
$wgDumpsOnDemandUseDefaultJobQueue = true;
$wgJobRunRate = 1;
$wgRunJobsAsync = false;
?>