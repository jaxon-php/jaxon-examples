<?php

require_once(__DIR__ . '/menu.php');

$menuEntries = menu_entries();
$requestUri = $_SERVER['REQUEST_URI'];
$pageTitle = $menuEntries[$requestUri] ?? '';

?>
                <ul class="nav nav-sidebar">
                    <li <?php if($requestUri === '/') { echo ' class="active"'; } ?>>
                        <a href="/">Home</a>
                    </li>
<?php foreach($menuEntries as $uri => $page): ?>
                    <li <?php if($requestUri === $uri): ?> class="active"<?php endif ?>>
                        <a href="<?php echo $uri ?>"><?php echo $page['title'] ?></a>
                    </li>
<?php endforeach ?>
                </ul>
