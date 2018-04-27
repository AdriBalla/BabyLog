#!/bin/bash

docker-compose kill && docker-compose rm -f && docker-compose up -d "$@"

docker exec -ti babylog_fpm /bin/bash -c "composer install"