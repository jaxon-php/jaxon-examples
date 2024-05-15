<?php

require(__DIR__ . '/defs.php');
require(__DIR__ . '/../../../includes/header.php');

use function Jaxon\pm;
use function Jaxon\rq;
?>

    <div class="container-fluid">
        <div class="row">
<?php require(__DIR__ . '/../../../includes/nav.php') ?>

            <div class="col-sm-9 content">
<?php require(__DIR__ . '/../../../includes/title.php') ?>

                <div class="row" id="jaxon-html">
                        <div class="col-md-12" id="div2">
                            &nbsp;
                        </div>
                        <div class="col-md-4 margin-vert-10">
                            <select class="form-control" id="colorselect" name="colorselect"
                                    onchange="<?php echo rq('HelloWorld')->setColor(pm()->select('colorselect'))->toJs() ?>">
                                <option value="black" selected="selected">Black</option>
                                <option value="red">Red</option>
                                <option value="green">Green</option>
                                <option value="blue">Blue</option>
                            </select>
                        </div>
                        <div class="col-md-8 margin-vert-10">
                            <button type="button" class="btn btn-primary" onclick="<?php echo rq('HelloWorld')->sayHello(1)
                                ->confirm('Sure?')->toJs() ?>" >CLICK ME</button>
                            <button type="button" class="btn btn-primary" onclick="<?php echo rq('HelloWorld')->sayHello(0)
                                ->confirm('Sure?')->toJs() ?>" >Click Me</button>
                            <button type="button" class="btn btn-primary" onclick="<?php echo rq('HelloWorld')->showDialog()
                                ->confirm('Sure?')->toJs() ?>" >Show Dialog</button>
                        </div>

                </div>
            </div> <!-- class="content" -->
       </div> <!-- class="row" -->
    </div>
<div id="jaxon-init">
<script type='text/javascript'>
    /* <![CDATA[ */
    window.onload = function() {
        // Call the HelloWorld class to populate the 2nd div
        <?php echo rq('HelloWorld')->sayHello(0, false) ?>;
        // call the HelloWorld->setColor() method on load
        <?php echo rq('HelloWorld')->setColor(pm()->select('colorselect'), false) ?>;
    }
    /* ]]> */
</script>
</div>

<?php require(__DIR__ . '/../../../includes/footer.php') ?>
