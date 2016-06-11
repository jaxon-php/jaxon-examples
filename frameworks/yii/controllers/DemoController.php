<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class DemoController extends Controller
{
    public function actionIndex()
    {
        // Set the layout
        $this->layout = 'demo';
        // Call the Jaxon module
        $jaxon = Yii::$app->getModule('jaxon');
        $jaxon->register();

        return $this->render('index', array(
            'JaxonCss' => $jaxon->css(),
            'JaxonJs' => $jaxon->js(),
            'JaxonScript' => $jaxon->script()
        ));
    }
}
