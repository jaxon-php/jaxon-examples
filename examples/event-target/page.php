<?php $this->extends('templates::examples/layout.php') ?>

<?php
use App\Test\Test as AppTest;
use App\Test\Buttons as AppButtons;
use Ext\Test\Test as ExtTest;
use Ext\Test\Buttons as ExtButtons;
?>

<?php $this->block('content') ?>
                <!-- Custom attribute: Multiple event handlers on child nodes, using dedicated divs. -->
                <div class="row" <?= attr()
                    ->select('.app-color-choice')->on('change',
                        rq(AppTest::class)->setColor(jq()->val()))
                    ->select('.ext-color-choice')->on('change',
                        rq(ExtTest::class)->setColor(jq()->val())) ?>>

                    <div class="col-md-12" <?= attr()->bind(rq(AppTest::class)) ?>>
                        Initial content : <?= cl(AppTest::class)->html() ?>
                    </div>
                    <div class="col-md-12">
                        <select class="form-control app-color-choice">
                            <option value="black" selected="selected">Black</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                        </select>
                    </div>
                    <div class="col-md-12 buttons" <?= attr()->bind(rq(AppButtons::class)) ?>>
                    </div>

                    <div class="col-md-12" <?= attr()->bind(rq(ExtTest::class)) ?>>
                        Initial content : <?= attr()->html(rq(ExtTest::class)) ?>
                    </div>
                    <div class="col-md-12">
                        <select class="form-control ext-color-choice">
                            <option value="black" selected="selected">Black</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                        </select>
                    </div>
                    <div class="col-md-12 buttons" <?= attr()->bind(rq(ExtButtons::class)) ?>>
                    </div>
                </div>
<?php $this->endblock() ?>

<?php $this->block('code') ?>
                <div class="card code">
                    <div class="card-body">
                        <?= highlight_file(__DIR__ . '/code.php', true) ?>
                    </div>
                </div>
<?php $this->endblock() ?>

<?php $this->block('javascript') ?>
<script type='text/javascript'>
    /* <![CDATA[ */
    window.onload = function() {
        <?= rq(AppTest::class)->sayHello(true) ?>;
        <?= rq(ExtTest::class)->sayHello(true) ?>;
    }
    /* ]]> */
</script>
<?php $this->endblock() ?>
