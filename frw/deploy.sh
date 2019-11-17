#!/bin/bash

wsp=/home/thierry/workspace/contrib/jaxon
frw=$wsp/jaxon-examples/frw

deploy_symfony()
{
    version=$1
    symfony_exp=$frw/symfony
    symfony_wsp=$wsp/jaxon-symfony
    symfony_dst=symfony-$version

    rm -rf $symfony_dst/vendor/jaxon-php/jaxon-symfony/src || true
    cp -r $symfony_wsp/src $symfony_dst/vendor/jaxon-php/jaxon-symfony/

    rm -rf $symfony_dst/jaxon || true
    cp -r $symfony_exp/jaxon $symfony_dst/

    cp -r $symfony_exp/src/* $symfony_dst/src/

    cp -r $symfony_exp/app/config/* $symfony_dst/app/config/

    cp -r $symfony_exp/app/views/* $symfony_dst/app/Resources/views/
}

deploy_laravel()
{
    version=$1
    laravel_frw=$frw/laravel

    cp
}

deploy_cake()
{
    version=$1
    cake_frw=$frw/cake

    cp
}

echo "Deploying Symfony..."

deploy_symfony 3.3
deploy_symfony 3.4
