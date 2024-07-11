# syntax=docker/dockerfile:1

FROM ghcr.io/linuxserver/baseimage-alpine-nginx:3.20

# set version
ARG MEDIAWIKI_MAJOR=1.42
ARG MEDIAWIKI_VERSION=1.42.0
LABEL maintainer="mchangrh"

RUN \
  echo "**** install build packages ****" && \
  apk add --no-cache --virtual=build-dependencies \
    gnupg && \
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
  echo "**** download & validate mediawiki ****" && \
  curl https://www.mediawiki.org/keys/keys.txt | \
    gpg --import && \
  DOWNLOAD_URL="https://releases.wikimedia.org/mediawiki/${MEDIAWIKI_MAJOR}/mediawiki-${MEDIAWIKI_VERSION}.tar.gz" && \
  curl -o \
  /tmp/mediawiki.tar.gz -L \
    "${DOWNLOAD_URL}" && \
  curl -o \
  /tmp/mediawiki.tar.gz.sig -L \
    "${DOWNLOAD_URL}.sig" && \
  gpg --batch --verify \
    /tmp/mediawiki.tar.gz.sig \
    /tmp/mediawiki.tar.gz && \
  echo "**** install mediawiki ****" && \
  mkdir -p \
    /app/www/public && \
  tar xf /tmp/mediawiki.tar.gz -C \
    /app/www/public --strip-components=1 && \
  echo "**** configure mediawiki ****" && \
  echo -e 'User-agent: *\nDisallow: /index.php' >> /app/www/public/robots.txt && \
  echo "**** cleanup ****" && \
  apk del --purge \
    build-dependencies && \
  rm -rf \
    /tmp/* \
    $HOME/.cache \
    $HOME/.gnupg

# copy local files
COPY root/ /

# ports and volumes
EXPOSE 80 443
VOLUME /config