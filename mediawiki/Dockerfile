ARG MEDIAWIKI_MAJOR=1.45
ARG MEDIAWIKI_GIT=REL1_45

# builder
FROM docker.io/alpine:3 AS builder
ARG MEDIAWIKI_GIT
RUN apk add --no-cache git
# use mw_add.sh to add extensions and skins
COPY mw_add.sh /usr/local/bin/mw_add
# add extensions and skins here
ARG EXTENSIONS="CodeMirror MobileFrontend UserMerge DumpsOnDemand TemplateStyles"
WORKDIR /extensions
RUN for extension in $EXTENSIONS; do mw_add "extensions" "$extension"; done
# ARG SKINS=""
# WORKDIR /skins
# RUN for skin in $SKINS; do mw_add "skins" "$skin"; done

# create final container
FROM ghcr.io/mchangrh/sb-wiki-base:${MEDIAWIKI_MAJOR}
ARG MEDIAWIKI_GIT
# install php extensions
RUN echo "**** install runtime packages ****" && \
    apk add --no-cache \
        php85-tokenizer \
        php85-sodium
COPY --from=builder /extensions/ /app/www/public/extensions
# COPY --from=builder skins/ /app/www/public/skins
ADD https://gerrit.wikimedia.org/r/mediawiki/vendor.git#${MEDIAWIKI_GIT} /app/www/public/vendor
# RUN cd /app/www/public && \
#     composer update && \
#     composer install \
#     --no-dev \
#     --optimize-autoloader \
#     --prefer-dist