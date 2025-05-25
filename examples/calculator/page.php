<?php $this->extends('templates::examples/layout.php') ?>

<?php
use App\Calculator\Calc;

use function Jaxon\attr;
use function Jaxon\cl;
use function Jaxon\rq;
?>

<?php $this->block('content') ?>
                <div class="row" <?php echo attr()->bind(rq(Calc::class)) ?>>
<?php echo cl(Calc::class)->html() ?>
                </div>
<?php $this->endblock() ?>

<?php $this->block('code') ?>
                <div class="card code">
                    <div class="card-body">
                        <?= highlight_file(__DIR__ . '/code.php', true) ?>
                    </div>
                </div>
<?php $this->endblock() ?>
