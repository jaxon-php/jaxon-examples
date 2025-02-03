<?php

require __DIR__ . '/defs.php';
require dirname(__DIR__, 3) . '/includes/header.php';
use function Jaxon\pm;
use function Jaxon\jq;
use function Jaxon\rq;

$color1 = jq('#colorselect1')->val();
$color2 = jq('#colorselect2')->val();
?>

    <div class="container-fluid">
<?php require dirname(__DIR__, 3) . '/includes/nav.php' ?>

        <div class="row">
            <div class="col-md-4 exp-form">
<?php require dirname(__DIR__, 3) . '/includes/title.php' ?>

                <div class="row">
                    <div class="col-md-12" id="div1">
                        &nbsp;
                    </div>
                    <div class="col-md-12">
                        <select class="form-control" id="colorselect1" name="colorselect1"
                                onchange="<?php echo rq('App.Test.Test')->setColor(pm()->select('colorselect1'))
                                    ->confirm('Set color to {1} not {2}?', $color1, $color2)->raw() ?>">
                            <option value="black" selected="selected">Black</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                        </select>
                    </div>
                    <div class="col-md-12 buttons">
                        <button type="button" class="btn btn-primary" onclick="<?php echo rq('App.Test.Test')->sayHello(1)->raw() ?>" >CLICK ME</button>
                        <button type="button" class="btn btn-primary" onclick="<?php echo rq('App.Test.Test')->sayHello(0)->raw() ?>" >Click Me</button>
                        <button type="button" class="btn btn-primary" onclick="<?php echo rq('App.Test.Test')->showDialog()->raw() ?>" >Show Dialog</button>
                    </div>

                    <div class="col-md-12" id="div2">
                        &nbsp;
                    </div>
                    <div class="col-md-12">
                        <select class="form-control" id="colorselect2" name="colorselect2"
                                onchange="<?php echo rq('Ext.Test.Test')->setColor(pm()->select('colorselect2'))
                                    ->confirm('Set color to {2} not {1}?', $color1, $color2)->raw() ?>">
                            <option value="black" selected="selected">Black</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                        </select>
                    </div>
                    <div class="col-md-12 buttons">
                        <button type="button" class="btn btn-primary" onclick="<?php echo rq('Ext.Test.Test')->sayHello(1)->raw() ?>" >CLICK ME</button>
                        <button type="button" class="btn btn-primary" onclick="<?php echo rq('Ext.Test.Test')->sayHello(0)->raw() ?>" >Click Me</button>
                        <button type="button" class="btn btn-primary" onclick="<?php echo rq('Ext.Test.Test')->showDialog()->raw() ?>" >Show Dialog</button>
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
        <?php echo rq('App.Test.Test')->sayHello(0, false) ?>;
        <?php echo rq('App.Test.Test')->setColor(pm()->select('colorselect1'), false) ?>;
        <?php echo rq('Ext.Test.Test')->sayHello(0, false) ?>;
        <?php echo rq('Ext.Test.Test')->setColor(pm()->select('colorselect2'), false) ?>;
    }
    /* ]]> */
</script>

<?php require dirname(__DIR__, 3) . '/includes/footer.php' ?>
