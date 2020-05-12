#!/usr/bin/env bash
docker-compose up -d --build
cp .env.dist .env
./dev/bin/exec app composer ezplatform-install
./dev/bin/exec exec app composer symfony-scripts
#MY_VAR=$(grep MY_VAR .env | xargs)
#MY_VAR=${MY_VAR#*=}

#MY_VAR=$(grep MY_VAR .env | cut -d '=' -f 2-)
# docker-compose exec mysql -u root --password=