<?php
wfLoadExtension( 'DumpsOnDemand' );
# dumps on demand settings
$wgDumpsOnDemandCompression = "gz";
# limit to 1 request/day
$wgDumpsOnDemandRequestLimit = 86400;
# permissions for dumps
# grant permission to all
$wgGroupPermissions['*']['dumpsondemand'] = true;
$wgGroupPermissions['vip']['dumprequestlog'] = true;
$wgGroupPermissions['vip']['dumpsondemand-limit-exempt'] = true;
# job runner config
# job run rate
$wgDumpsOnDemandUseDefaultJobQueue = true;
$wgJobRunRate = 1;
$wgRunJobsAsync = true;
?>