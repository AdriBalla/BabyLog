#!/bin/bash

docker-compose kill && docker-compose rm -f

docker volume prune --force

rm -rf ./laravel/vendor

rm ./laravel/composer.lock

