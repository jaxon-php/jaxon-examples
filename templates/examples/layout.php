<?php
$example = menu_entries()[menu_current()] ?? [];
?>
<?php $this->include('templates::examples/header.php') ?>

    <div class="container-fluid">
<?php $this->include('templates::examples/nav.php') ?>

        <div class="row">
            <div class="col-md-4 exp-form">
                <h3 class="page-header"><?= $example['title'] ?? '' ?></h3>
                <div class="row">
                    <div class="col-md-12">
                        <?= $example['desc'] ?? '' ?>
                    </div>
                </div>

<?= $this->content ?>
            </div> <!-- class="exp-form" -->

            <div class="col-md-8 exp-code">
<?= $this->code ?>
            </div>
        </div> <!-- class="row" -->
    </div>

<?= $this->javascript ?>

<?php $this->include('templates::examples/footer.php') ?>
