<?php

require(__DIR__ . '/../../includes/menu.php');

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

$rootDir = realpath(__DIR__ . '/../../../frw/yii');

require($rootDir . '/vendor/autoload.php');
require($rootDir . '/vendor/yiisoft/yii2/Yii.php');

$config = require($rootDir . '/config/web.php');

(new yii\web\Application($config))->run();
