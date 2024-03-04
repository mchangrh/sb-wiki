mediawiki base image loosely based on [lscr.io dokuwiki](https://github.com/linuxserver/docker-dokuwiki)

```
uid: 984
gid: 984

/config/mediawiki/data: sqlite
/config/mediawiki/images: uploaded images
/config/logs: logs
```

### references
[lscr alpine-nginx](https://github.com/linuxserver/docker-baseimage-alpine-nginx)  
[lscr baseimage](https://github.com/linuxserver/docker-baseimage-alpine)  
[dockerhub mediawiki](https://github.com/wikimedia/mediawiki-docker/blob/main/1.39/apache/Dockerfile)  

### additional packages
- git - [config nag](https://www.mediawiki.org/wiki/Manual:Running_MediaWiki_on_Debian_or_Ubuntu#Optional_useful_packages)
- diffutils - [wgDiff3](https://www.mediawiki.org/wiki/Manual:$wgDiff3)
- python3 - [SyntaxHighlighting](https://www.mediawiki.org/wiki/Extension:SyntaxHighlight#Installation)

### sources
[Mediawiki Dependencies](https://www.mediawiki.org/wiki/Manual:Installation_requirements)  
[Alpine Wiki Dependencies](https://wiki.alpinelinux.org/wiki/MediaWiki)  
[Performance Tuning](https://www.mediawiki.org/wiki/Manual:Performance_tuning#Bytecode_caching)  

<details>
    <summary>Package List</summary>

    mediawiki-base
    - diffutils
    - imagemagick
    - librsvg
    - python3
    - php83-calendar
    - php83-dom
    - php83-fileinfo
    - php83-intl
    - php83-json
    - php83-mysqli
    - php83-opcache
    - php83-pgsql
    - php83-pdo_sqlite
    - php83-pecl-apcu
    - php83-pecl-imagick
    - php83-xmlreader
    - php83-zlib
    baseimage-alpine-nginx
    - composer
    - git
    - php83
    - php83-common
    - php83-ctype
    - php83-curl
    - php83-fileinfo
    - php83-fpm
    - php83-iconv
    - php83-mbstring
    - php83-openssl
    - php83-phar
    - php83-session
    - php83-simplexml
    - php83-xml
    - php83-xmlwriter
    - php83-zip
    baseimage-alpine
    - bash
    - curl
</summary>