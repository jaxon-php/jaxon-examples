<?php

require_once(__DIR__ . '/menu.php');

$menuEntries = menu_entries();
$requestUri = $_SERVER['REQUEST_URI'];
$pageTitle = $menuEntries[$requestUri] ?? '';

?>
        <div class="row">
            <div class="col-12">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link<?php if($requestUri === '/') { echo ' active'; }
                            ?>" href="/">Home</a>
                    </li>
<?php foreach($menuEntries as $uri => $page): ?>
                    <li class="nav-item">
                        <a class="nav-link<?php if($requestUri === $uri) { echo ' active'; }
                            ?>" href="<?php echo $uri ?>"><?php echo $page['title'] ?></a>
                    </li>
<?php endforeach ?>
                </ul>
            </div>
        </div>
