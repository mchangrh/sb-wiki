#!/bin/sh
restic -r "${DB_REPOSITORY}" restore --target / latest
restic -r "${MW_REPOSITORY}" restore --target / latest