<?php
$example = menu_entries()[menu_current()] ?? [];
?>
<?php $this->include('templates::examples/header.php') ?>

    <div class="container-fluid">
<?php $this->include('templates::examples/nav.php') ?>

        <div class="row">
            <div class="col-md-12">
                <h3 class="page-header"><?= $example['title'] ?? '' ?></h3>
            </div>
            <div class="col-md-5 exp-desc">
                <?= $example['desc'] ?? '' ?>
            </div> <!-- class="exp-desc" -->

            <div class="col-md-7 exp-form">
<?= $this->content ?>
            </div> <!-- class="exp-form" -->
        </div> <!-- class="row" -->

        <div class="row">
            <div class="col-md-12 exp-code">
<?= $this->code ?>
            </div>
        </div> <!-- class="row" -->
    </div>

<?php $this->include('templates::examples/footer.php', ['javascript' => $this->javascript]) ?>
