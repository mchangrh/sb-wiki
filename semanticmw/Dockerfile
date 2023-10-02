ARG \
  MEDIAWIKI_MAJOR=1.39 \
  MEDIAWIKI_GIT=REL1_39 \
  HOME=/root \
  COMPOSER=composer.local.json

# create final container
FROM ghcr.io/mchangrh/sb-wiki:${MEDIAWIKI_MAJOR}
RUN \
  echo "**** install runtime packages ****" && \
  apk add --no-cache \
     php82-tokenizer && \
  echo "**** configure composer ****" && \
  cd /app/www/public && \
  composer config --no-plugins allow-plugins.wikimedia/composer-merge-plugin true && \
  echo "**** install SemanticMediaWiki ****" && \
  composer require --no-update mediawiki/semantic-media-wiki && \
  composer update --no-dev && \
  rm -rf \
    /root/.composer
COPY root/ /
