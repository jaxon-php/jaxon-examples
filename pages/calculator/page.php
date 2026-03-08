<?php $this->extends('templates::examples/layout.php') ?>

<?php
use App\Calculator\Calc;
?>

<?php $this->block('content') ?>
                <div class="row" <?= attr()->bind(rq(Calc::class)) ?>>
<?= cl(Calc::class)->html() ?>
                </div>
<?php $this->endblock() ?>

<?php $this->block('code') ?>
                <div class="card code">
                    <div class="card-body">
                        <?= highlight_file(__DIR__ . '/code.php', true) ?>
                    </div>
                </div>
<?php $this->endblock() ?>
