<?php
$requestUri = trim($_SERVER['REQUEST_URI'], '/');
$codeFile = dirname(__DIR__, 1) . "/public/$requestUri/code.php";
?>

<div class="card code">
    <div class="card-body">
        <?= highlight_file($codeFile, true) ?>
    </div>
</div>
