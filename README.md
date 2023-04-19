# SponsorBlock Wiki base container

## enter into container
`docker-compose exec mediawiki bash`

# adding new extensions
new extensions can be git clone'd at the following URL: `https://gerrit.wikimedia.org/r/mediawiki/extensions/ExtensionName` or just added to the script

This directory should not be bind mounted since some extensions are distributed **with** mediawiki

# adding new skins
same process as extensions, go instead to `skins` directory and cloen from 
`git clone https://gerrit.wikimedia.org/r/mediawiki/skins/SkinName`

# other notes
- make sure to bind mount the image, don't use a volume
- logos and other resources cannot be in subdirectories within /images for some reason
