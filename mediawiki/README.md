# SponsorBlock Wiki base container

## enter into container
`docker-compose exec mediawiki bash`

# adding new extensions / skins
New extensions/ skins can be cloned at the following URL: `https://gerrit.wikimedia.org/r/mediawiki/type/name`
This is largely automated in `mw_add.sh`

These directories should not be bind mounted and should be part of the build process because some distributions are distributed **with** mediawiki and bind mounts will override the defaults in the containers

# settings
These settings are exhaustive, with secrets managed locally. 

# other notes
- make sure to bind mount the image, don't use a volume
- logos and other resources cannot be in subdirectories within /images for some reason
