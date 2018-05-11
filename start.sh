#!/bin/bash

docker-compose kill && docker-compose rm -f && docker-compose up -d --build

docker exec -ti babylog_fpm /bin/bash -c "composer install"