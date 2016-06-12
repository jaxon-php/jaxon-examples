<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;

class DemoController extends Controller
{
    protected $jaxon = null;

    public function actionIndex()
    {
        $this->jaxon = Yii::$app->getModule('jaxon');
        // Set the layout
        $this->layout = 'demo';
        // Call the Jaxon module
        $this->jaxon->register();

        return $this->render('index', array(
            'JaxonCss' => $this->jaxon->css(),
            'JaxonJs' => $this->jaxon->js(),
            'JaxonScript' => $this->jaxon->script(),
        ));
    }

    public function actionProcess()
    {
        $this->jaxon = Yii::$app->getModule('jaxon');
        // Process Jaxon request
        if($this->jaxon->canProcessRequest())
        {
            $this->jaxon->processRequest();
        }
    }
}
