#!/bin/bash

echo "Installing CakePHP..."

rm -rf cake-3.*

composer create-project --prefer-dist cakephp/app cake-3.0 "3.0.*"
composer create-project --prefer-dist cakephp/app cake-3.1 "3.1.*"
composer create-project --prefer-dist cakephp/app cake-3.2 "3.2.*"
composer create-project --prefer-dist cakephp/app cake-3.3 "3.3.*"

(cd cake-3.0; composer require jaxon-php/jaxon-cake "^3.0"; composer require jaxon-php/jaxon-dialogs "^3.0")
(cd cake-3.1; composer require jaxon-php/jaxon-cake "^3.0"; composer require jaxon-php/jaxon-dialogs "^3.0")
(cd cake-3.2; composer require jaxon-php/jaxon-cake "^3.0"; composer require jaxon-php/jaxon-dialogs "^3.0")
(cd cake-3.3; composer require jaxon-php/jaxon-cake "^3.0"; composer require jaxon-php/jaxon-dialogs "^3.0")

cp cake-3.0/config/app.default.php cake-3.0/config/app.php
cp cake-3.1/config/app.default.php cake-3.1/config/app.php

echo ""
echo "Done!"

echo "Installing Symfony..."

rm -rf symfony-*

symfony new symfony-3.3 "3.3"
symfony new symfony-3.4 "3.4"
composer create-project symfony/website-skeleton symfony-4.0 "4.0.*"
composer create-project symfony/website-skeleton symfony-4.1 "4.1.*"
composer create-project symfony/website-skeleton symfony-4.2 "4.2.*"
composer create-project symfony/website-skeleton symfony-4.3 "4.3.*"

(cd symfony-3.3; composer require jaxon-php/jaxon-symfony "^3.0"; composer require jaxon-php/jaxon-dialogs "^3.0")
(cd symfony-3.4; composer require jaxon-php/jaxon-symfony "^3.0"; composer require jaxon-php/jaxon-dialogs "^3.0")
(cd symfony-4.0; composer require jaxon-php/jaxon-symfony "^3.0"; composer require jaxon-php/jaxon-dialogs "^3.0")
(cd symfony-4.1; composer require jaxon-php/jaxon-symfony "^3.0"; composer require jaxon-php/jaxon-dialogs "^3.0")
(cd symfony-4.2; composer require jaxon-php/jaxon-symfony "^3.0"; composer require jaxon-php/jaxon-dialogs "^3.0")
(cd symfony-4.3; composer require jaxon-php/jaxon-symfony "^3.0"; composer require jaxon-php/jaxon-dialogs "^3.0")

echo ""
echo "Done!"

echo "Installing Zend Framework..."

rm -rf zend-*

composer create-project --stability="dev" zendframework/skeleton-application zend-2.3 "2.3.*"
composer create-project --stability="dev" zendframework/skeleton-application zend-2.5 "2.5.*"
composer create-project --stability="dev" zendframework/skeleton-application zend-3.0 "3.0.*"
composer create-project --stability="dev" zendframework/skeleton-application zend-3.1 "3.1.*"

(cd zend-2.3; composer require jaxon-php/jaxon-zend "^3.0"; composer require jaxon-php/jaxon-dialogs "^3.0")
(cd zend-2.5; composer require jaxon-php/jaxon-zend "^3.0"; composer require jaxon-php/jaxon-dialogs "^3.0")
(cd zend-3.0; composer require jaxon-php/jaxon-zend "^3.0"; composer require jaxon-php/jaxon-dialogs "^3.0")
(cd zend-3.1; composer require jaxon-php/jaxon-zend "^3.0"; composer require jaxon-php/jaxon-dialogs "^3.0")

echo ""
echo "Done!"

echo "Installing Yii..."

rm -rf yii

composer global require "fxp/composer-asset-plugin:^1.2.0"
composer create-project --prefer-dist yiisoft/yii2-app-basic yii "2.0.*"

(cd yii; composer require jaxon-php/jaxon-yii "^3.0"; composer require jaxon-php/jaxon-dialogs "^3.0")

echo "Done!"
echo ""

echo "Installing CodeIgniter..."

rm -rf codeigniter

composer create-project ellislab/codeigniter codeigniter "3.1.*"

(cd codeigniter; composer require jaxon-php/jaxon-codeigniter "^3.0"; composer require jaxon-php/jaxon-dialogs "^3.0")
