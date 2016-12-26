<?php

$menuEntries = array(
    'index.php' => 'Home',
    'hello.php' => 'Hello World Function',
    'alias.php' => 'Hello World Alias',
    'class.php' => 'Hello World Class',
    'merge.php' => 'Merge Javascript',
    'plugins.php' => 'Plugin Usage',
    'config.php' => 'Config File',
    'directories.php' => 'Register Directories',
    'namespaces.php' => 'Register Namespaces',
    'autoload-default.php' => 'Default Autoloader',
    'autoload-disabled.php' => 'Third Party Autoloader',
    'autoload-separated.php' => 'Separated Files',
    'frw/laravel' => 'Laravel Framework',
    'frw/symfony' => 'Symfony Framework',
    'frw/zend' => 'Zend Framework',
    'frw/codeigniter' => 'CodeIgniter Framework',
    'frw/yii' => 'Yii Framework',
);

?>
            <div class="col-sm-3 sidebar">
                <ul class="nav nav-sidebar">
<?php foreach($menuEntries as $filename => $title): ?>
                    <li<?php if($filename == 'codeigniter') echo ' class="active"'; ?>><a href="/exp/<?php echo $filename ?>"><?php echo $title ?></a></li>
<?php endforeach ?>
                </ul>
            </div>
