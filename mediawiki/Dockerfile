ARG MEDIAWIKI_MAJOR=1.41
ARG MEDIAWIKI_GIT=REL1_41

# builder
FROM docker.io/alpine:3 as builder
ARG MEDIAWIKI_GIT
RUN apk add --no-cache composer git
# use mw_add.sh to add extensions and skins
COPY mw_add.sh /usr/local/bin/mw_add
# add extensions and skins here
ARG EXTENSIONS="MobileFrontend UserMerge DumpsOnDemand TemplateStyles"
WORKDIR /extensions
RUN for extension in $EXTENSIONS; do mw_add "extensions" "$extension"; done
# ARG SKINS=""
# WORKDIR /skins
# RUN for skin in $SKINS; do mw_add "skins" "$skin"; done

# create final container
FROM ghcr.io/mchangrh/sb-wiki-base:${MEDIAWIKI_MAJOR}
COPY --from=builder /extensions/ /app/www/public/extensions
# COPY --from=builder skins/ /app/www/public/skins
