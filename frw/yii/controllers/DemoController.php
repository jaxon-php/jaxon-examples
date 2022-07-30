<?php

namespace app\controllers;

use Jaxon\App\Test\Bts;
use Jaxon\App\Test\Pgw;
use Jaxon\Yii\Filter\ConfigFilter as JaxonConfigFilter;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\Response;
use Yii;

use function Jaxon\jaxon;

class DemoController extends Controller
{
    public function behaviors()
    {
        return [
            [
                'class' => JaxonConfigFilter::class,
                'only' => ['index', 'jaxon'],
            ],
        ];
    }

    public function actionJaxon()
    {
        $jaxon = jaxon()->app();
        if(!$jaxon->canProcessRequest())
        {
            // Jaxon failed to find a plugin to process the request
            return; // Todo: return an error message
        }

        $jaxon->processRequest();
        return $jaxon->httpResponse();
    }

    public function actionIndex()
    {
        $jaxon = jaxon()->app();

        // Set the layout
        $this->layout = 'demo';

        return $this->render('index', [
            'jaxonCss' => $jaxon->css(),
            'jaxonJs' => $jaxon->js(),
            'jaxonScript' => $jaxon->script(),
            'pageTitle' => "Yii Framework",
            'menuEntries' => [],
            'menuSubdir' => '',
            // Jaxon request to the Jaxon\App\Test\Bts controller
            'bts' => $jaxon->request(Bts::class),
            // Jaxon request to the Jaxon\App\Test\Pgw controller
            'pgw' => $jaxon->request(Pgw::class),
        ]);
    }
}
