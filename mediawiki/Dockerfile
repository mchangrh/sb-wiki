# builder
FROM alpine:latest as builder
RUN apk add --no-cache git
# add extensions and skins here
ARG EXTENSIONS="MobileFrontend UserMerge DumpsOnDemand"
# ARG SKINS=""
# use mw_add.sh to add extensions and skins
COPY mw_add.sh /usr/local/bin/mw_add
WORKDIR /extensions
RUN for extension in $EXTENSIONS; do mw_add "extensions" "$extension"; done
# WORKDIR /skins
# RUN for skin in $SKINS; do mw_add "skins" "$skin"; done
# create final container
FROM mediawiki:1.39
COPY --from=builder /extensions/ /var/www/html/extensions
# COPY --from=builder skins/ /var/www/html/skins
COPY php.ini /usr/local/etc/php/conf.d/mediawiki.ini