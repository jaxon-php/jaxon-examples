<?php
$menuEntries = menu_entries();
$requestUri = $_SERVER['REQUEST_URI'];
$pageTitle = $menuEntries[$requestUri] ?? '';
?>
<?php $this->include('templates::examples/header.php') ?>

    <div class="container-fluid">
<?php $this->include('templates::examples/nav.php', [
    'menuEntries' => $menuEntries,
    'requestUri' => $requestUri,
]) ?>

        <div class="row">
            <div class="col-md-4 exp-form">
                <h3 class="page-header"><?php echo $menuEntries[$requestUri]['title'] ?? '' ?></h3>
                <div class="row">
                    <div class="col-md-12">
                        <?php echo $menuEntries[$requestUri]['desc'] ?? '' ?>
                    </div>
                </div>

<?php echo $this->content ?>

            </div> <!-- class="exp-form" -->

            <div class="col-md-8 exp-code">
<?php echo $this->code ?>
            </div>
        </div> <!-- class="row" -->
    </div>

<?php echo $this->javascript ?>

<?php $this->include('templates::examples/footer.php') ?>
