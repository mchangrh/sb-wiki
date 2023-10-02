ARG MEDIAWIKI_MAJOR=1.40
ARG MEDIAWIKI_GIT=REL1_40

# builder
FROM alpine:latest as builder
ARG MEDIAWIKI_GIT
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
FROM ghcr.io/mchangrh/sb-wiki-base:${MEDIAWIKI_MAJOR}
COPY --from=builder /extensions/ /app/www/public/extensions
# COPY --from=builder skins/ /app/www/public/skins
