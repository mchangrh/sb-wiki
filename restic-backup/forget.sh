#!/bin/sh
restic -r "${DB_REPOSITORY}" forget --prune --keep-daily 7 --keep-weekly 8
restic -r "${MW_REPOSITORY}" forget --prune --keep-daily 7 --keep-weekly 8