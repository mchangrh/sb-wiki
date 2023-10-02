# makefile
mw-base:
	docker build mediawiki-base -t ghcr.io/mchangrh/sb-wiki-base:$(version)
mw: mw-base
	docker build mediawiki -t ghcr.io/mchangrh/sb-wiki:$(version)
smw: mw
	docker build semanticmw -t ghcr.io/mchangrh/sb-smw:$(version)
volumes: rm-volume
	docker volume create data-mariadb
	docker volume create data-caddy
	docker volume create data-mediawiki
	docker volume create data-semanticmw
rm-volume:
	docker volume rm data-mariadb
	docker volume rm data-caddy
	docker volume rm data-mediawiki
	docker volume rm data-semanticmw