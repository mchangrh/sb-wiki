# syntax=docker/dockerfile:1

FROM alpine:3 AS validator
ARG MEDIAWIKI_MAJOR=1.42
ARG MEDIAWIKI_VERSION=1.42.3
ADD https://www.mediawiki.org/keys/keys.txt /tmp/keys.txt
ADD https://releases.wikimedia.org/mediawiki/$MEDIAWIKI_MAJOR/mediawiki-$MEDIAWIKI_VERSION.tar.gz /tmp/mediawiki-$MEDIAWIKI_VERSION.tar.gz
ADD https://releases.wikimedia.org/mediawiki/$MEDIAWIKI_MAJOR/mediawiki-$MEDIAWIKI_VERSION.tar.gz.sig /tmp/mediawiki-$MEDIAWIKI_VERSION.tar.gz.sig
RUN apk add --no-cache gnupg && \
    gpg --import /tmp/keys.txt && \
    mkdir -p /app/www/public
RUN gpg --batch --verify \
      /tmp/mediawiki-$MEDIAWIKI_VERSION.tar.gz.sig \
      /tmp/mediawiki-$MEDIAWIKI_VERSION.tar.gz && \
    tar xf /tmp/mediawiki-$MEDIAWIKI_VERSION.tar.gz -C \
      /app/www/public --strip-components=1 && \
    mv /app/www/public/composer.local.json-sample \
      /app/www/public/composer.local.json && \
    echo -e 'User-agent: *\nDisallow: /index.php' >> /app/www/public/robots.txt

FROM ghcr.io/linuxserver/baseimage-alpine-nginx:3.20 AS final

# set version
LABEL maintainer="mchangrh"

RUN \
  echo "**** install runtime packages ****" && \
  apk add --no-cache \
    diffutils \
    imagemagick \
    librsvg \
    python3 \
    php83-calendar \
    php83-dom \
    php83-intl \
    php83-opcache \
    php83-mysqli \
    php83-pgsql \
    php83-pdo_sqlite \
    php83-pecl-apcu \
    php83-pecl-imagick \
    php83-xmlreader \
    php83-zlib && \
  echo "**** cleanup ****" && \
  rm -rf \
    /tmp/* \
    $HOME/.cache

# copy local files
COPY --from=validator /app/www/public/ /app/www/public/
COPY root/ /

# ports and volumes
EXPOSE 80 443
VOLUME /config