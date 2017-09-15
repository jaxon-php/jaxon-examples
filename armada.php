<?php

require (__DIR__ . '/vendor/autoload.php');

$armada = jaxon()->armada();
$armada->config(__DIR__ . '/armada/config/jaxon.php');

$armada->session()->start();
$armada->session()->set('DialogTitle', 'Yeah Man!!');
if($armada->canProcessRequest())
{
    // Process the request
    $armada->processRequest();
}
else
{
    // Register the classes
    $armada->register();
}

// Jaxon request to the Jaxon\App\Test\Bts classe
$bts = $armada->request(\Jaxon\App\Test\Bts::class);
// Jaxon request to the Jaxon\App\Test\Pgw classe
$pgw = $armada->request(\Jaxon\App\Test\Pgw::class);

$rqPgwSetColor = $pgw->setColor(rq()->select('renderer'), rq()->select('colorselect1'))
    ->confirm('Set color to {1}?', rq()->select('colorselect1'));
$rqPgwShowDialog = $pgw->showDialog(rq()->select('renderer'))->confirm('Confirm?');

$rqBtsSetColor = $bts->setColor(rq()->select('renderer'), rq()->select('colorselect2'))
    ->when(rq()->checked('div2-enabled'))
    // ->ifeq(rq()->select('colorselect2'), 'blue')
    ->else('Cannot set color to {1} because the checkbox is disabled', rq()->select('colorselect2'));
$rqBtsShowDialog = $bts->showDialog(rq()->select('renderer'))
    ->when(rq()->checked('div2-enabled'))
    // ->ifne(rq()->select('colorselect2'), 'blue')
    ->else('Sorry, the checkbox is disabled');

require(__DIR__ . '/includes/header.php')
?>

    <div class="container-fluid">
        <div class="row">
<?php require(__DIR__ . '/includes/nav.php') ?>
            <div class="col-sm-9 content">
                <h3 class="page-header">Armada</h3>

                <div class="row" id="jaxon-html">
                        <div class="col-md-4" id="div1">
                            &nbsp;
                        </div>
                        <div class="col-md-2">
                            Render with: 
                        </div>
                        <div class="col-md-6">
                            <select class="form-control" id="renderer" name="renderer" style="width:150px;">
                                <option value="smarty" selected="selected">Smarty</option>
                                <option value="twig">Twig</option>
                                <option value="dwoo">Dwoo</option>
                                <option value="latte">Latte</option>
                                <option value="blade">Blade</option>
                                <option value="raintpl">RainTpl</option>
                            </select>
                        </div>
                        <div class="col-md-4 margin-vert-10 clearfix">
                            <select class="form-control" id="colorselect1" name="colorselect1" onchange="<?php echo $rqPgwSetColor ?>">
                                <option value="black" selected="selected">Black</option>
                                <option value="red">Red</option>
                                <option value="green">Green</option>
                                <option value="blue">Blue</option>
                            </select>
                        </div>
                        <div class="col-md-8 margin-vert-10">
                            <button type="button" class="btn btn-primary" onclick="<?php echo $pgw->sayHello(rq()->select('renderer'), 1)
                                ->confirm('Confirm?') ?>" >CLICK ME</button>
                            <button type="button" class="btn btn-primary" onclick="<?php echo $pgw->sayHello(rq()->select('renderer'), 0)
                                ->confirm('Confirm?') ?>" >Click Me</button>
                            <button type="button" class="btn btn-primary" onclick="<?php echo $rqPgwShowDialog ?>" >PgwModal Dialog</button>
                        </div>

                        <div class="col-md-4" id="div2">
                            &nbsp;
                        </div>
                        <div class="col-md-8">
                            <input type="checkbox" name="div2-enabled" id="div2-enabled" /> Check to enable
                        </div>
                        <div class="col-md-4 margin-vert-10 clearfix">
                            <select class="form-control" id="colorselect2" name="colorselect2" onchange="<?php echo $rqBtsSetColor ?>">
                                <option value="black" selected="selected">Black</option>
                                <option value="red">Red</option>
                                <option value="green">Green</option>
                                <option value="blue">Blue</option>
                            </select>
                        </div>
                        <div class="col-md-8 margin-vert-10">
                            <button type="button" class="btn btn-primary" onclick="<?php echo $bts->sayHello(rq()->select('renderer'), 1)
                                ->when(rq()->checked('div2-enabled'))->else('Sorry, the checkbox is disabled') ?>" >CLICK ME</button>
                            <button type="button" class="btn btn-primary" onclick="<?php echo $bts->sayHello(rq()->select('renderer'), 0)
                                ->when(rq()->checked('div2-enabled'))->else('Sorry, the checkbox is disabled') ?>" >Click Me</button>
                            <button type="button" class="btn btn-primary" onclick="<?php echo $rqBtsShowDialog ?>" >Bootstrap Dialog</button>
                        </div>

                </div>
            </div> <!-- class="content" -->
       </div> <!-- class="row" -->
    </div>
<div id="jaxon-init">
<script type='text/javascript'>
    /* <![CDATA[ */
    window.onload = function() {
        // call the helloWorld function to populate the div on load
    	<?php echo $pgw->sayHello(rq()->select('renderer'), 0, false) ?>;
        // call the setColor function on load
        <?php echo $pgw->setColor(rq()->select('renderer'), rq()->select('colorselect1'), false) ?>;
        // Call the HelloWorld class to populate the 2nd div
        <?php echo $bts->sayHello(rq()->select('renderer'), 0, false) ?>;
        // call the HelloWorld->setColor() method on load
        <?php echo $bts->setColor(rq()->select('renderer'), rq()->select('colorselect2'), false) ?>;
    }
    /* ]]> */
</script>
</div>

<?php require(__DIR__ . '/includes/footer.php') ?>
