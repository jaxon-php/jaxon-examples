<?php

require __DIR__ . '/defs.php';
require dirname(__DIR__, 3) . '/includes/header.php';

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
<?php require dirname(__DIR__, 3) . '/includes/nav.php' ?>
            </div>

            <div class="col-sm-9 content">
<?php require dirname(__DIR__, 3) . '/includes/title.php' ?>

                <div class="row">
                    <div class="col-md-12" <?php echo attr()->bind(rq(AppTest::class)) ?>>
                        Initial content : <?php echo cl(AppTest::class)->html() ?>
                    </div>
                    <!-- Custom attribute: Event handler on child nodes, using a selector. -->
                    <div class="col-md-4 margin-vert-10" <?php echo attr()
                            ->on(['.color-choice', 'change'], rq(AppTest::class)->setColor(jq()->val())) ?>>
                        <select class="form-control color-choice">
                            <option value="black" selected="selected">Black</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                        </select>
                    </div>
                    <div class="col-md-8 margin-vert-10" <?php echo attr()->bind(rq(AppButtons::class)) ?>>
                    </div>

                    <div class="col-md-12" <?php echo attr()->bind(rq(ExtTest::class)) ?>>
                        Initial content : <?php echo cl(ExtTest::class)->html() ?>
                    </div>
                    <!-- Custom attribute: Event handler on child nodes, using a selector. -->
                    <div class="col-md-4 margin-vert-10" <?php echo attr()
                            ->on(['.color-choice', 'change'], rq(ExtTest::class)->setColor(jq()->val())) ?>>
                        <select class="form-control color-choice">
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

<?php require dirname(__DIR__, 3) . '/includes/footer.php' ?>
