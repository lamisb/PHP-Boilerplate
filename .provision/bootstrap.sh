#!/usr/bin/env bash
sudo apt-get -y install software-properties-common python-software-properties
sudo add-apt-repository ppa:ondrej/php
sudo apt-get -y update
sudo apt-get -y install php-fpm  php7.1-xml php7.1-mysql php-mbstring php-zip
sudo apt-get -y install git
sudo apt-get -y install nginx

#install phpunit
cd /tmp
wget https://phar.phpunit.de/phpunit.phar
chmod +x phpunit.phar
sudo mv phpunit.phar /usr/local/bin/phpunit
phpunit --version

#install composer
curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer

#Install mysql
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password password root'
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password root'
sudo apt-get -y install mysql-server


# Mysql allow global access
sudo sed -i "s/.*bind-address.*/bind-address = 0.0.0.0/" /etc/mysql/my.cnf
sudo mysql -u root -proot --execute "GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY 'root' with GRANT OPTION;"
sudo service mysql stop
sudo service mysql start


# set up nginx server
sudo cp /vagrant/.provision/nginx.conf /etc/nginx/sites-available/site.conf
sudo chmod 644 /etc/nginx/sites-available/site.conf
sudo ln -s /etc/nginx/sites-available/site.conf /etc/nginx/sites-enabled/site.conf


#Kill port and Start nginx (Something seems to be occupying port 80!)
sudo fuser -k 80/tcp
#sudo php-fpm
sudo service nginx restart



# clean /var/www
sudo rm -Rf /var/www
mkdir /var/www


# symlink /var/www => /vagrant
ln -s /vagrant /var/www/boilerplate
