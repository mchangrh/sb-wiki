#!/bin/sh
restic -r "${DB_REPOSITORY}" check --with-cache
restic -r "${MW_REPOSITORY}" check --with-cache