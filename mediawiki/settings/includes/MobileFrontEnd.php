<?php
wfLoadExtension( 'MobileFrontend' );
## skin customization
# mobile
$wgDefaultMobileSkin = 'minerva';
$wgMinervaDonateLink['base'] = false;
$wgMinervaNightMode['base'] = true;
$wgMFCollapseSectionsByDefault = false;
# mobile dark theme
$wgMFSiteStylesRenderBlocking = true;
# use Mobile.css instead of Common.css (https://github.com/wikimedia/mediawiki-extensions-MobileFrontend?tab=readme-ov-file#wgmfcustomsitemodules)
$wgMFCustomSiteModules = false;
?>