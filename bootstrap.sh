#!/usr/bin/env bash

# Install dependencies
apt-get update -y
apt-get install -y \
	git-core \
	python-software-properties \
	python \
	g++ \
	make \
	curl \
	php5-cli \
	php5-xsl \
	php5-intl \
	graphviz

# Install Node.js and Grunt
add-apt-repository -y ppa:chris-lea/node.js

apt-get update -y
apt-get install -y nodejs

npm install -g grunt-cli

# Install composer globally
curl -sS https://getcomposer.org/installer | php

mv composer.phar /usr/local/bin/composer

# Install project
cd /vagrant

composer install
npm install