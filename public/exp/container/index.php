<?php

require __DIR__ . '/defs.php';
require dirname(__DIR__, 3) . '/includes/header.php';
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
                        <select class="form-control" id="colorselect" name="colorselect"
                                onchange="<?php echo rq('HelloWorld')->setColor(pm()->select('colorselect'))->raw() ?>">
                            <option value="black" selected="selected">Black</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                        </select>
                    </div>
                    <div class="col-md-12 buttons">
                        <button type="button" class="btn btn-primary" onclick="<?php echo rq('HelloWorld')->sayHello(1, 'Thierry Feuzeu')->raw() ?>" >CLICK ME</button>
                        <button type="button" class="btn btn-primary" onclick="<?php echo rq('HelloWorld')->sayHello(0, 'Thierry Feuzeu')->raw() ?>" >Click Me</button>
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
        // Call the HelloWorld class to populate the 2nd div
        <?php echo rq('HelloWorld')->sayHello(0, 'Thierry Feuzeu') ?>;
        // call the HelloWorld->setColor() method on load
        <?php echo rq('HelloWorld')->setColor(pm()->select('colorselect')) ?>;
    }
    /* ]]> */
</script>

<?php require dirname(__DIR__, 3) . '/includes/footer.php' ?>
