FROM alpine:latest as builder
RUN apk add --no-cache git
# Install our extensions
RUN git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/UserMerge && \
  git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/MobileFrontend
# go into each extension and checkout the correct branch, delete .git
RUN cd MobileFrontend && \
  git checkout REL1_39 && \
  rm -rf .git
RUN cd UserMerge && \
  git checkout REL1_39 && \
  rm -rf .git

FROM mediawiki:1.39
COPY --from=builder /MobileFrontend /UserMerge /var/www/html/extensions