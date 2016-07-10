<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;

class DemoController extends Controller
{
    public function actionIndex()
    {
        $jaxon = Yii::$app->getModule('jaxon');
        // Set the layout
        $this->layout = 'demo';
        // Call the Jaxon module
        $jaxon->register();

        return $this->render('index', array(
            'JaxonCss' => $jaxon->css(),
            'JaxonJs' => $jaxon->js(),
            'JaxonScript' => $jaxon->script(),
        ));
    }

    public function actionProcess()
    {
        $jaxon = Yii::$app->getModule('jaxon');
        // Process Jaxon request
        if($jaxon->canProcessRequest())
        {
            $jaxon->processRequest();
        }
    }
}
