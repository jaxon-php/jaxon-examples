<?php

require (__DIR__ . '/vendor/autoload.php');

$jaxon = jaxon()->module();
$jaxon->config(__DIR__ . '/module/config/jaxon.php');

session_start();
if($jaxon->canProcessRequest())
{
    // Process the request
    $jaxon->processRequest();
}
else
{
    $_SESSION['DialogTitle'] = 'Yeah Man!!';
    // Register the classes
    $jaxon->register();
}

// Jaxon request to the Jaxon\App\Test\Bts controller
$bts = $jaxon->request('Jaxon.App.Test.Bts');
// Jaxon request to the Jaxon\App\Test\Pgw controller
$pgw = $jaxon->request('Jaxon.App.Test.Pgw');

require(__DIR__ . '/includes/header.php')
?>

    <div class="container-fluid">
        <div class="row">
<?php require(__DIR__ . '/includes/nav.php') ?>
            <div class="col-sm-9 content">
                <h3 class="page-header">Hello World Function</h3>

                <div class="row" id="jaxon-html">
                        <div class="col-md-12" id="div1">
                            &nbsp;
                        </div>
                        <div class="col-md-4 margin-vert-10">
                            <select class="form-control" id="colorselect1" name="colorselect1"
                                    onchange="<?php echo $pgw->setColor(rq()->select('colorselect1'))
                                    ->confirm('Set color to {1}?', rq()->select('colorselect1')) ?>; return false;">
                                <option value="black" selected="selected">Black</option>
                                <option value="red">Red</option>
                                <option value="green">Green</option>
                                <option value="blue">Blue</option>
                            </select>
                        </div>
                        <div class="col-md-8 margin-vert-10">
                            <button type="button" class="btn btn-primary" onclick="<?php echo $pgw->sayHello(1)
                                ->confirm('Confirm?') ?>; return false;" >CLICK ME</button>
                            <button type="button" class="btn btn-primary" onclick="<?php echo $pgw->sayHello(0)
                                ->confirm('Confirm?') ?>; return false;" >Click Me</button>
                            <button type="button" class="btn btn-primary" onclick="<?php echo $pgw->showDialog()
                                ->confirm('Confirm?') ?>; return false;" >PgwModal Dialog</button>
                        </div>

                        <div class="col-md-6" id="div2">
                            &nbsp;
                        </div>
                        <div class="col-md-6">
                            <input type="checkbox" name="div2-enabled" id="div2-enabled" /> Check to enable
                        </div>
                        <div class="col-md-4 margin-vert-10">
                            <select class="form-control" id="colorselect2" name="colorselect2"
                                    onchange="<?php echo $bts->setColor(rq()->select('colorselect2'))
                                    ->when(rq()->checked('div2-enabled'), 'Cannot set color to {1} because the checkbox is disabled', rq()->select('colorselect2')) ?>; return false;">
                                <option value="black" selected="selected">Black</option>
                                <option value="red">Red</option>
                                <option value="green">Green</option>
                                <option value="blue">Blue</option>
                            </select>
                        </div>
                        <div class="col-md-8 margin-vert-10">
                            <button type="button" class="btn btn-primary" onclick="<?php echo $bts->sayHello(1)
                                ->when(rq()->checked('div2-enabled'), 'Sorry, the checkbox is disabled') ?>; return false;" >CLICK ME</button>
                            <button type="button" class="btn btn-primary" onclick="<?php echo $bts->sayHello(0)
                                ->when(rq()->checked('div2-enabled'), 'Sorry, the checkbox is disabled') ?>; return false;" >Click Me</button>
                            <button type="button" class="btn btn-primary" onclick="<?php echo $bts->showDialog()
                                ->when(rq()->checked('div2-enabled'), 'Sorry, the checkbox is disabled') ?>; return false;" >Bootstrap Dialog</button>
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
    	<?php echo $pgw->sayHello(0, false) ?>;
        // call the setColor function on load
        <?php echo $pgw->setColor(rq()->select('colorselect1'), false) ?>;
        // Call the HelloWorld class to populate the 2nd div
        <?php echo $bts->sayHello(0, false) ?>;
        // call the HelloWorld->setColor() method on load
        <?php echo $bts->setColor(rq()->select('colorselect2'), false) ?>;
    }
    /* ]]> */
</script>
</div>

<?php require(__DIR__ . '/includes/footer.php') ?>
