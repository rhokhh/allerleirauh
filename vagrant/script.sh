#!/bin/bash

# Updating repository

sudo apt-get -y update

# Installing Apache

sudo apt-get -y install apache2

# Installing MySQL and it's dependencies, Also, setting up root password for MySQL as it will prompt to enter the password during installation

sudo debconf-set-selections <<< 'mysql-server-5.5 mysql-server/root_password password rootpass'
sudo debconf-set-selections <<< 'mysql-server-5.5 mysql-server/root_password_again password rootpass'
sudo apt-get -y install mysql-server libapache2-mod-auth-mysql php5-mysql

# Installing PHP and it's dependencies
sudo apt-get -y install php5 libapache2-mod-php5 php5-mcrypt


#create contao db

mysql -u root -prootpass -e "create database contao; GRANT ALL PRIVILEGES ON contao.* TO contao@localhost IDENTIFIED BY 'contao'"


#install Contao 3.5

curl -L http://download.contao.org | tar -xzp

export DIR=/var/www/html/contao

sudo cp -r -a contao-3.5.6/. $DIR/

sudo chown -R  www-data:www-data $DIR/
sudo chmod -R 755 $DIR/
sudo chmod -R 775 $DIR/assets/images/
sudo chmod -R 775 $DIR/system/logs/
sudo chmod -R 775 $DIR/system/tmp
sudo mv $DIR/.htaccess.default $DIR/.htaccess

