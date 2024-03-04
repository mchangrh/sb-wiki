<?php
## Extensions
# builtin
wfLoadExtension( 'PageImages' );
wfLoadExtension( 'VisualEditor' );
wfLoadExtension( 'WikiEditor' );
wfLoadExtension( 'SyntaxHighlight_GeSHi' );
# downloaded
wfLoadExtension( 'Cite' );
# wfLoadExtension( 'Nuke' );
wfLoadExtension( 'ParserFunctions' );
wfLoadExtension( 'TemplateStyles' );

# Extension configs
require_once "/includes/DumpsOnDemand.php";
require_once "/includes/MobileFrontEnd.php";
# require_once "/includes/UserMerge.php";

# Must be enabled last
# wfLoadExtension( 'Moderation' );
?>