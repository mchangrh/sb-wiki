FROM docker.io/alpine:3
RUN apk add --no-cache restic
COPY /root /

CMD crond -l 2 -f