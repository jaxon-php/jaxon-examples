<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;

class DemoController extends Controller
{
    public function actionIndex()
    {
        $menuEntries = array(
            'index.php' => 'Home',
            'hello.php' => 'Hello World Function',
            'alias.php' => 'Hello World Alias',
            'class.php' => 'Hello World Class',
            'extern.php' => 'Export Javascript',
            'plugins.php' => 'Plugin Usage',
            'flot.php' => 'Flot Plugin',
            'config.php' => 'Config File',
            'directories.php' => 'Register Directories',
            'namespaces.php' => 'Register Namespaces',
            'autoload-default.php' => 'Default Autoloader',
            'autoload-composer.php' => 'Composer Autoloader',
            'autoload-disabled.php' => 'Third Party Autoloader',
            'armada.php' => 'Armada',
            'laravel/' => 'Laravel Framework',
            'symfony/' => 'Symfony Framework',
            'zend/' => 'Zend Framework',
            'codeigniter/' => 'CodeIgniter Framework',
            'yii/' => 'Yii Framework',
            'cake/' => 'CakePHP Framework',
        );

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
            'menuEntries' => $menuEntries,
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
