#!/bin/bash

docker-compose kill && docker-compose rm -f

docker volume prune --force