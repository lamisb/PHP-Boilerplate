#!/usr/bin/env bash

sudo apt-get -y install software-properties-common python-software-properties
sudo add-apt-repository ppa:ondrej/php
sudo apt-get -y update
sudo apt-get -y install php
sudo apt-get -y install php-fpm
sudo mv /usr/sbin/php-fpm7.1 /usr/sbin/php-fpm
sudo apt-get -y install nginx

# set up nginx server
sudo cp /vagrant/.provision/nginx.conf /etc/nginx/sites-available/site.conf
sudo chmod 644 /etc/nginx/sites-available/site.conf
sudo ln -s /etc/nginx/sites-available/site.conf /etc/nginx/sites-enabled/site.conf

#Kill port and Start nginx (Something seems to be occupying port 80!)
sudo fuser -k 80/tcp
sudo service nginx restart

# clean /var/www
sudo rm -Rf /var/www
mkdir /var/www


# symlink /var/www => /vagrant
ln -s /vagrant /var/www/boilerplate
