FROM mediawiki:1.39

# Install our extensions
RUN cd /var/www/html/extensions && \
  git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/UserMerge && \
  git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/MobileFrontend

# go into each extension and checkout the correct branch
RUN cd /var/www/html/extensions/MobileFrontend && \
  git checkout REL1_39 && \
  cd /var/www/html/extensions/UserMerge && \
  git checkout REL1_39