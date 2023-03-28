# SponsorBlock Wiki base container

## enter into container
`docker-compose exec mediawiki bash`

# installing new extension
< enter into container >  
`cd extensions`  
`git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/ExtensionName`  
** DO NOT BIND MOUNT TO LOCAL DIRECTORY, EXTENSIONS WILL NOT UPDATE WITH MEDIAWIKI AND BREAK THE SERVER**

# installing new skin
same as extensions  
`git clone https://gerrit.wikimedia.org/r/mediawiki/skins/SkinName`

# php
php.ini is at `/usr/local/etc/php/php.ini`, not `php-ini.production`

# image bind mount
bind mount, not volume >:(