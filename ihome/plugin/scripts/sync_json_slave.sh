#!/bin/bash

scp -P2000 $1 apache@localhost:$1
ssh -p2000 apache@localhost "bash /var/www/ihome/ihome/plugin/scripts/sync_json.sh $1"