<?php

require(__DIR__ . '/defs.php');
require(__DIR__ . '/../../../includes/header.php');

use App\Test\Test as AppTest;
use App\Test\Buttons as AppButtons;
use Ext\Test\Test as ExtTest;
use Ext\Test\Buttons as ExtButtons;

use function Jaxon\attr;
use function Jaxon\cl;
use function Jaxon\pm;
use function Jaxon\rq;
?>

    <div class="container-fluid">
        <div class="row">
<?php require(__DIR__ . '/../../../includes/nav.php') ?>

            <div class="col-sm-9 content">
<?php require(__DIR__ . '/../../../includes/title.php') ?>

                <div class="row" id="jaxon-html">
                    <div class="col-md-12" jxn-component="<?php echo attr()->name(rq(AppTest::class)) ?>">
                        Initial content : <?php echo cl(AppTest::class)->html() ?>
                    </div>
                    <div class="col-md-4 margin-vert-10">
                        <select class="form-control" id="colorselect1" jxn-on="change"
                            jxn-func="<?php echo attr()->func(rq(AppTest::class)
                                ->setColor(pm()->select('colorselect1'))) ?>">
                            <option value="black" selected="selected">Black</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                        </select>
                    </div>
                    <div class="col-md-8 margin-vert-10" jxn-component="<?php echo attr()->name(rq(AppButtons::class)) ?>">
                    </div>

                    <div class="col-md-12" jxn-component="<?php echo attr()->name(rq(ExtTest::class)) ?>">
                        Initial content : <?php echo cl(ExtTest::class)->html() ?>
                    </div>
                    <div class="col-md-4 margin-vert-10">
                        <select class="form-control" id="colorselect2" jxn-on="change"
                            jxn-func="<?php echo attr()->func(rq(ExtTest::class)
                                ->setColor(pm()->select('colorselect2'))) ?>">
                            <option value="black" selected="selected">Black</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                        </select>
                    </div>
                    <div class="col-md-8 margin-vert-10" jxn-component="<?php echo attr()->name(rq(ExtButtons::class)) ?>">
                    </div>
                </div>
            </div> <!-- class="content" -->
       </div> <!-- class="row" -->
    </div>
<div id="jaxon-init">
<script type='text/javascript'>
    /* <![CDATA[ */
    window.onload = function() {
        <?php echo rq(AppTest::class)->sayHello(true) ?>;
        <?php echo rq(ExtTest::class)->sayHello(true) ?>;
    }
    /* ]]> */
</script>
</div>

<?php require(__DIR__ . '/../../../includes/footer.php') ?>
