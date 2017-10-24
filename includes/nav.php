<?php

require_once(__DIR__ . '/menu.php');

$menuEntries = menu_entries();
$menuSubdir = menu_subdir();

$requestFile = new \SplFileInfo($_SERVER['SCRIPT_FILENAME']);
$requestFilename = $requestFile->getBasename();
$pageTitle = '';

?>
            <div class="col-sm-3 sidebar">
                <ul class="nav nav-sidebar">
<?php foreach($menuEntries as $filename => $title): ?>
                    <li<?php if($filename == $requestFilename) {echo ' class="active"'; $pageTitle = $title;} ?>>
                        <a href="<?php echo $menuSubdir, $filename ?>"><?php echo $title ?></a>
                    </li>
<?php endforeach ?>
                </ul>
            </div>
