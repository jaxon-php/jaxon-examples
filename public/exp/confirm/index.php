<?php

require __DIR__ . '/defs.php';
require dirname(__DIR__, 3) . '/includes/header.php';
use function Jaxon\jq;
use function Jaxon\pm;
use function Jaxon\rq;
?>

    <div class="container-fluid">
<?php require dirname(__DIR__, 3) . '/includes/nav.php' ?>

        <div class="row">
            <div class="col-md-4 exp-form">
<?php require dirname(__DIR__, 3) . '/includes/title.php' ?>

                <div class="row">
                    <div class="col-md-12" id="div2">
                        &nbsp;
                    </div>
                    <div class="col-md-12">
                        <select class="form-control" id="colorselect" name="colorselect">
                            <option value="black" selected="selected">Black</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                        </select>
                    </div>
                    <div class="col-md-12 buttons">
                        <button type="button" class="btn btn-primary" id="btn-uppercase">CLICK ME</button>
                        <button type="button" class="btn btn-primary" id="btn-lowercase">Click Me</button>
                    </div>
                </div>
            </div> <!-- class="exp-form" -->

            <div class="col-md-8 exp-code">
<?php require dirname(__DIR__, 3) . '/includes/code.php' ?>
            </div>
       </div> <!-- class="row" -->
    </div>

<script type='text/javascript'>
    /* <![CDATA[ */
    window.onload = function() {
        // Set event handlers
        <?php echo jq('#colorselect')
            ->on('change', rq('HelloWorld')
            ->setColor(pm()->select('colorselect'))
            ->confirm('Set color to {1}', pm()->select('colorselect'))) ?>;
        <?php echo jq('#btn-uppercase')
            ->on('click', rq('HelloWorld')
            ->sayHello(1)
            ->confirm('Convert to uppercase?')) ?>;
        <?php echo jq('#btn-lowercase')
            ->on('click', rq('HelloWorld')
            ->sayHello(0)
            ->confirm('Convert to lowercase?')) ?>;
        // Call the HelloWorld class to populate the 2nd div
        <?php echo rq('HelloWorld')->sayHello(0) ?>;
    }
    /* ]]> */
</script>

<?php require dirname(__DIR__, 3) . '/includes/footer.php' ?>
