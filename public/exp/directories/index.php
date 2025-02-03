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
                    <div class="col-md-12" id="div1">
                        &nbsp;
                    </div>
                    <div class="col-md-12">
                        <select class="form-control" id="colorselect1" name="colorselect1"
                            onchange="<?php echo rq('App')->setColor(pm()->select('colorselect1'))->raw() ?>">
                            <option value="black" selected="selected">Black</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                        </select>
                    </div>
                    <div class="col-md-12 buttons">
                        <button type="button" class="btn btn-primary" onclick="<?php echo rq('App')->sayHello(1)->raw() ?>" >CLICK ME</button>
                        <button type="button" class="btn btn-primary" onclick="<?php echo rq('App')->sayHello(0)->raw() ?>" >Click Me</button>
                        <button type="button" class="btn btn-primary" onclick="<?php echo rq('App')->showDialog()->raw() ?>" >Show Dialog</button>
                    </div>

                    <div class="col-md-12" id="div2">
                        &nbsp;
                    </div>
                    <div class="col-md-12">
                        <select class="form-control" id="colorselect2" name="colorselect2"
                            onchange="<?php echo rq('Ext')->setColor(pm()->select('colorselect2'))->raw() ?>">
                            <option value="black" selected="selected">Black</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                        </select>
                    </div>
                    <div class="col-md-12 buttons">
                        <button type="button" class="btn btn-primary" onclick="<?php echo rq('Ext')->sayHello(1)->raw() ?>" >CLICK ME</button>
                        <button type="button" class="btn btn-primary" onclick="<?php echo rq('Ext')->sayHello(0)->raw() ?>" >Click Me</button>
                        <button type="button" class="btn btn-primary" onclick="<?php echo rq('Ext')->showDialog()->raw() ?>" >Show Dialog</button>
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
        <?php echo rq('App')->sayHello(0, false) ?>;
        <?php echo rq('App')->setColor(pm()->select('colorselect1'), false) ?>;
        <?php echo rq('Ext')->sayHello(0, false) ?>;
        <?php echo rq('Ext')->setColor(pm()->select('colorselect2'), false) ?>;
    }
    /* ]]> */
</script>

<?php require dirname(__DIR__, 3) . '/includes/footer.php' ?>
