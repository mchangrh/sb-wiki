#!/bin/sh
MW_VERSION=1_39

type=$1 # skins or extensions
name=$2 # name of skin or extension
git clone "https://gerrit.wikimedia.org/r/mediawiki/$type/$name"
cd "$name" || exit
git checkout REL"$MW_VERSION"
rm -rf .git
cd ../