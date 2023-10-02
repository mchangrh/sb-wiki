#!/bin/bash
BRANCH=$1

VERS="$(curl \
    --data-urlencode "action=expandtemplates" \
    --data-urlencode "format=json" \
    --data-urlencode "prop=wikitext" \
    --data-urlencode "text={{MW $BRANCH release git}};{{MW $BRANCH branch number}};{{MW $BRANCH release number}}" \
    https://www.mediawiki.org/w/api.php | \
    jq -r '.expandtemplates.wikitext')"
IFS=';' read -ra OUTPUTS <<< "$VERS"
{ echo "GIT=${OUTPUTS[0]}"; echo "MAJOR=${OUTPUTS[1]}"; echo "VERSION=${OUTPUTS[2]}"; } >> "$GITHUB_OUTPUT"