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
