#!/usr/bin/env bash

rm -rf ./src ./xhprof
git clone -b badoo-7.0 https://github.com/tony2001/xhprof.git ./xhprof
git clone git@github.com:grizmar/oxana.git ./src
docker-compose run --user=www-data --workdir=/var/www/oxana php composer install