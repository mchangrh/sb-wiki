#!/bin/sh

type=$1 # "skins" or "extensions"
name=$2 # name of skin or extension
git clone "https://gerrit.wikimedia.org/r/mediawiki/$type/$name"
cd "$name" || exit
git checkout "$MEDIAWIKI_GIT"
rm -rf .git
if [ -f composer.json ]; then
  composer install --no-dev --prefer-dist --optimize-autoloader
fi
cd ../