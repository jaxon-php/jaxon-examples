<?php
use App\Calculator\Calc;
?>
                <div class="row" <?= attr()->bind(rq(Calc::class)) ?>>
<?= cl(Calc::class)->html() ?>
                </div>
