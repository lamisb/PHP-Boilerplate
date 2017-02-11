#!/usr/bin/env bash

composer install
./vendor/bin/phinx migrate
mysql -uroot -proot -e "create database IF NOT EXISTS test"

mkdir -p /tmp/cache
sudo chown www-data:www-data -R /tmp/cache/
rm -Rf /tmp/cache/*
