FROM alpine:3 as builder
WORKDIR /scripts
COPY ./backup.sh ./backup.sh
COPY ./forget.sh ./forget.sh

FROM alpine:3
RUN apk add --no-cache restic
COPY --from=builder --chmod=755 /scripts /usr/local/bin/

RUN echo '30  *  *  *  *    /usr/local/bin/backup.sh' >> /etc/crontabs/root
RUN echo '10  0  *  *  1    /usr/local/bin/forget.sh' >> /etc/crontabs/root

CMD crond -l 2 -f