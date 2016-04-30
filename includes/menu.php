<?php

$menuEntries = array(
	'index.php' => 'Home',
	'hello.php' => 'Hello World Function',
	'class.php' => 'Hello World Class',
	'merge.php' => 'Merge Javascript',
	'plugins.php' => 'Plugin Usage',
	'config-file.php' => 'Config File',
	'classdirs.php' => 'Register Directories',
	'namespaces.php' => 'Register Namespaces',
	'autoload-default.php' => 'Default Autoloader',
	'autoload-composer.php' => 'Composer Autoloader',
	'autoload-disabled.php' => 'Third Party Autoloader',
	'autoload-separated.php' => 'Separated Files',
);

$requestFile = new \SplFileInfo($_SERVER['SCRIPT_FILENAME']);
$requestFilename = $requestFile->getBasename();

?>
			<div class="col-sm-3 col-md-2 sidebar">
				<ul class="nav nav-sidebar">
<?php foreach($menuEntries as $filename => $title): ?>
					<li<?php if($filename == $requestFilename) echo ' class="active"'; ?>><a href="<?php echo $filename ?>"><?php echo $title ?></a></li>
<?php endforeach ?>
				</ul>
			</div>
