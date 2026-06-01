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
[Alpine MediaWiki Dependencies](https://wiki.alpinelinux.org/wiki/MediaWiki)  
[Performance Tuning](https://www.mediawiki.org/wiki/Manual:Performance_tuning)  

<details>
    <summary>Package List</summary>

    mediawiki-base
    - diffutils
    - imagemagick
    - librsvg
    - python3
    - php85-calendar
    - php85-dom
    - php85-fileinfo
    - php85-intl
    - php85-json
    - php85-mysqli
    - php85-pgsql
    - php85-pdo_sqlite
    - php85-pecl-apcu
    - php85-pecl-imagick
    - php85-xmlreader
    - php85-zlib
    baseimage-alpine-nginx
    - composer
    - git
    - php85
    - php85-common
    - php85-ctype
    - php85-curl
    - php85-fileinfo
    - php85-fpm
    - php85-iconv
    - php85-mbstring
    - php85-openssl
    - php85-phar
    - php85-session
    - php85-simplexml
    - php85-xml
    - php85-xmlwriter
    - php85-zip
    baseimage-alpine
    - bash
    - curl
</summary>