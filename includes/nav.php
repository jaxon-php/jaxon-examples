<?php

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

$requestFile = new \SplFileInfo($_SERVER['SCRIPT_FILENAME']);
$requestFilename = $requestFile->getBasename();
$pageTitle = '';

?>
            <div class="col-sm-3 sidebar">
                <ul class="nav nav-sidebar">
<?php foreach($menuEntries as $filename => $title): ?>
                    <li<?php if($filename == $requestFilename) {echo ' class="active"'; $pageTitle = $title;} ?>>
                        <a href="/exp/<?php echo $filename ?>"><?php echo $title ?></a>
                    </li>
<?php endforeach ?>
                </ul>
            </div>
