<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;

class DemoController extends Controller
{
    public function actionIndex()
    {
        // Init the session
        Yii::$app->session->set('DialogTitle', 'Yeah Man!!');
        // Set the layout
        $this->layout = 'demo';
        // Call the Jaxon module
        $jaxon = Yii::$app->getModule('jaxon');
        $jaxon->register();

        return $this->render('index', array(
            'jaxonCss' => $jaxon->css(),
            'jaxonJs' => $jaxon->js(),
            'jaxonScript' => $jaxon->script(),
            'pageTitle' => "Yii Framework",
            'menuEntries' => menu_entries(),
            'menuSubdir' => menu_subdir(),
            // Jaxon request to the Jaxon\App\Test\Bts controller
            'bts' => $jaxon->request(\Jaxon\App\Test\Bts::class),
            // Jaxon request to the Jaxon\App\Test\Pgw controller
            'pgw' => $jaxon->request(\Jaxon\App\Test\Pgw::class),
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
