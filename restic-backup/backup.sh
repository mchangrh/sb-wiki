#!/bin/sh
restic -r "${DB_REPOSITORY}" backup "${DB_PATH}"
restic -r "${MW_REPOSITORY}" backup "${MW_PATH}"