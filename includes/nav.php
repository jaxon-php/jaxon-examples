<?php

require_once(__DIR__ . '/menu.php');

$menuEntries = menu_entries();
$requestUri = $_SERVER['REQUEST_URI'];
$pageTitle = $menuEntries[$requestUri] ?? '';

?>
        <div class="row nav-examples">
            <div class="col-12">
                <a href="/"><span class="badge bg-<?php echo $requestUri === '/' ?
                    'primary' : 'secondary'; ?>">Home</span></a>
<?php foreach($menuEntries as $uri => $page): ?>
                <a href="<?php echo $uri ?>"><span class="badge bg-<?php echo $requestUri === $uri ?
                    'primary' : 'secondary'; ?>"><?php echo $page['title'] ?></span></a>
<?php endforeach ?>
            </div>
        </div>
