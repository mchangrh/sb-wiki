FROM alpine:latest as builder
RUN apk add --no-cache git
ARG MW_VERSION=1_39
ARG EXTENSIONS="MobileFrontend UserMerge DumpsOnDemand"

WORKDIR extensions
RUN for extension in $EXTENSIONS; do \
    git clone "https://gerrit.wikimedia.org/r/mediawiki/extensions/$extension" && \
    cd "$extension" && \
    git checkout REL"${MW_VERSION}" && \
    rm -rf .git && \
    cd ..; \
  done

FROM mediawiki:1.39
COPY --from=builder extensions/ /var/www/html/extensions
COPY php.ini /usr/local/etc/php/conf.d/mediawiki.ini