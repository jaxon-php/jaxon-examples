<?php

require(__DIR__ . '/defs.php');
require(__DIR__ . '/../../../includes/header.php');

use App\Test\Test as AppTest;
use App\Test\Buttons as AppButtons;
use Ext\Test\Test as ExtTest;
use Ext\Test\Buttons as ExtButtons;

use function Jaxon\attr;
use function Jaxon\cl;
use function Jaxon\jq;
use function Jaxon\rq;
?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 sidebar">
<?php require(__DIR__ . '/../../../includes/nav.php') ?>
            </div>

            <div class="col-sm-9 content">
<?php require(__DIR__ . '/../../../includes/title.php') ?>

                <!-- Custom attribute: Multiple event handlers on child nodes, using dedicated divs. -->
                <div class="row" <?php echo attr()->target() ?>>
                    <div <?php echo attr()
                        ->event(['.app-color-choice', 'change'], rq(AppTest::class)->setColor(jq()->val())) ?>>
                    </div>
                    <div <?php echo attr()
                        ->event(['.ext-color-choice', 'change'], rq(ExtTest::class)->setColor(jq()->val())) ?>>
                    </div>

                    <div class="col-md-12" <?php echo attr()->bind(rq(AppTest::class)) ?>>
                        Initial content : <?php echo cl(AppTest::class)->html() ?>
                    </div>
                    <div class="col-md-4 margin-vert-10">
                        <select class="form-control app-color-choice">
                            <option value="black" selected="selected">Black</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                        </select>
                    </div>
                    <div class="col-md-8 margin-vert-10" <?php echo attr()->bind(rq(AppButtons::class)) ?>>
                    </div>

                    <div class="col-md-12" <?php echo attr()->bind(rq(ExtTest::class)) ?>>
                        Initial content : <?php echo attr()->html(rq(ExtTest::class)) ?>
                    </div>
                    <div class="col-md-4 margin-vert-10">
                        <select class="form-control ext-color-choice">
                            <option value="black" selected="selected">Black</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                        </select>
                    </div>
                    <div class="col-md-8 margin-vert-10" <?php echo attr()->bind(rq(ExtButtons::class)) ?>>
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