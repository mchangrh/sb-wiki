# mariadb cross-host migration procedures
```
# backup
docker run --rm -v data-mariadb:/dbdata -v $(pwd):/backup alpine tar czvf /backup/backup.tar /dbdata

# restore
docker run --rm -v data-mariadb:/dbdata -v $(pwd):/backup alpine ash -c "cd /dbdata && tar xvf /backup/backup.tar --strip 1"
```