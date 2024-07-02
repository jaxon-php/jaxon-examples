<?php

require(__DIR__ . '/defs.php');
require(__DIR__ . '/../../../includes/header.php');

use App\Test\Test as AppTest;
use App\Test\Buttons as AppButtons;
use Ext\Test\Test as ExtTest;
use Ext\Test\Buttons as ExtButtons;

use function Jaxon\attr;
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

                <div class="row">
                    <div class="col-md-12" <?php echo attr()->show(rq(AppTest::class)) ?>>
                        Initial content : <?php echo attr()->html(rq(AppTest::class)) ?>
                    </div>
                    <div class="col-md-4 margin-vert-10">
                        <!-- Custom attribute: Event handler on DOM node. -->
                        <select class="form-control" <?php echo attr()->on('change', rq(AppTest::class)->setColor(jq()->val())) ?>>
                            <option value="black" selected="selected">Black</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                        </select>
                    </div>
                    <div class="col-md-8 margin-vert-10" <?php echo attr()->show(rq(AppButtons::class)) ?>>
                    </div>

                    <div class="col-md-12" <?php echo attr()->show(rq(ExtTest::class)) ?>>
                        Initial content : <?php echo attr()->html(rq(ExtTest::class)) ?>
                    </div>
                    <div class="col-md-4 margin-vert-10">
                        <!-- Custom attribute: Event handler on DOM node. -->
                        <select class="form-control" <?php echo attr()->on('change', rq(ExtTest::class)->setColor(jq()->val())) ?>>
                            <option value="black" selected="selected">Black</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                        </select>
                    </div>
                    <div class="col-md-8 margin-vert-10" <?php echo attr()->show(rq(ExtButtons::class)) ?>>
                    </div>
                </div>

                <div class="row" style="margin-top: 20px;">
                    <!-- Custom attribute: Component for paginated content. -->
                    <div class="col-md-12" <?php echo attr()->show(rq(PageContent::class)) ?>>
                        <?php echo attr()->html(rq(PageContent::class)) ?>
                    </div>
                    <!-- Custom attribute: Component for pagination links. -->
                    <div class="col-md-12 margin-vert-10" <?php echo attr()->show(rq(Paginator::class)) ?>>
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
        <?php echo rq(Paginator::class)->showPage(1) ?>;
    }
    /* ]]> */
</script>
</div>

<?php require(__DIR__ . '/../../../includes/footer.php') ?>
