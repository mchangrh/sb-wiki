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
    - composer (manual)
    - diffutils
    - imagemagick
    - librsvg
    - python3
    - php82-calendar
    - php82-dom
    - php82-fileinfo
    - php82-intl
    - php82-opcache
    - php82-mysqli
    - php82-pgsql
    - php82-pdo_sqlite
    - php82-pecl-apcu
    - php82-pecl-imagick
    - php82-xmlreader
    baseimage-alpine-nginx
    - git
    - php82
    - php82-ctype
    - php82-curl
    - php82-fileinfo
    - php82-fpm
    - php82-iconv
    - php82-json
    - php82-mbstring
    - php82-openssl
    - php82-phar
    - php82-session
    - php82-simplexml
    - php82-xml
    - php82-xmlwriter
    - php82-zip
    - php82-zlib
    baseimage-alpine
    - bash
    - curl
</summary>