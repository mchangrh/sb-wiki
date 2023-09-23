# syntax=docker/dockerfile:1

FROM ghcr.io/linuxserver/baseimage-alpine-nginx:3.18

# set version
ARG MEDIAWIKI_MAJOR_VERSION=1.39
ARG MEDIAWIKI_VERSION=1.39.4

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
    php82-calendar \
    php82-dom \
    php82-fileinfo \
    php82-intl \
    php82-opcache \
    php82-mysqli \
    php82-pgsql \
    php82-pdo_sqlite \
    php82-pecl-apcu \
    php82-pecl-imagick \
    php82-xmlreader && \
  echo "**** install mediawiki ****" && \
  curl https://www.mediawiki.org/keys/keys.txt | \
    gpg --import && \
  DOWNLOAD_URL="https://releases.wikimedia.org/mediawiki/${MEDIAWIKI_MAJOR_VERSION}/mediawiki-${MEDIAWIKI_VERSION}.tar.gz" && \
  curl -o \
  /tmp/mediawiki.tar.gz -L \
    "${DOWNLOAD_URL}" && \
	curl -o \
  /tmp/mediawiki.tar.gz.sig -L \
    "${DOWNLOAD_URL}.sig" && \
  gpg --batch --verify \
    /tmp/mediawiki.tar.gz.sig \
    /tmp/mediawiki.tar.gz && \
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
    "$GNUPGHOME"
# copy local files
COPY root/ /

# ports and volumes
EXPOSE 80 443
VOLUME /config