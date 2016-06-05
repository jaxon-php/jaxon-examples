<?php

require (__DIR__ . '/vendor/autoload.php');

use Jaxon\Jaxon;
use Jaxon\Response\Response;
use Jaxon\Request\Factory as xr;

$jaxon = Jaxon::getInstance();

// $jaxon->setOption('core.debug.on', true);
$jaxon->setOption('core.prefix.class', 'Jaxon');

/*
 * Sets the following options on the Toastr library
 * - toastr.options.closeButton = true;
 * - toastr.options.closeMethod = 'fadeOut';
 * - toastr.options.closeDuration = 300;
 * - toastr.options.closeEasing = 'swing';
 */
$jaxon->setOptions(array(
    'toastr.options.closeButton' => true,
    'toastr.options.closeMethod' => 'fadeOut',
    'toastr.options.closeDuration' => 300,
    'toastr.options.closeEasing' => 'swing',
    'toastr.options.positionClass' => 'toast-bottom-left',
));

/*
 * Sets the following options on the PgwModal
 * - closeOnEscape = true;
 * - closeOnBackgroundClick = true;
 * - maxWidth = 300;
*/
$jaxon->setOptions(array(
    'pgw.modal.options.closeOnEscape' => true,
    'pgw.modal.options.closeOnBackgroundClick' => true,
    'pgw.modal.options.maxWidth' => 600,
));
// $jaxon->plugin('pgwModal')->setInclude(false);

class HelloWorld
{
    public function sayHello($isCaps)
    {
        if ($isCaps)
            $text = 'HELLO WORLD!';
        else
            $text = 'Hello World!';

        $xResponse = new Response();
        $xResponse->assign('div2', 'innerHTML', $text);
        $xResponse->toastr->success("div2 text is now $text");

        return $xResponse;
    }

    public function setColor($sColor)
    {
        $xResponse = new Response();
        $xResponse->assign('div2', 'style.color', $sColor);
        $xResponse->toastr->success("div2 color is now $sColor");
        
        return $xResponse;
    }

    public function showPgwDialog()
    {
        $xResponse = new Response();
        $buttons = array(array('title' => 'Close', 'class' => 'btn', 'click' => 'close'));
        $options = array('maxWidth' => 400);
        $xResponse->pgw->modal("Modal Dialog", "This modal dialog is powered by PgwModal!!", $buttons, $options);
        
        return $xResponse;
    }

    public function showTbDialog()
    {
        $xResponse = new Response();
        $buttons = array(array('title' => 'Close', 'class' => 'btn', 'click' => 'close'));
        $width = 300;
        $xResponse->bootstrap->modal("Modal Dialog", "This modal dialog is powered by Twitter Bootstrap!!", $buttons, $width);
        
        return $xResponse;
    }
}

// Register object
$jaxon->register(Jaxon::CALLABLE_OBJECT, new HelloWorld());

// Process the request, if any.
$jaxon->processRequest();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <title>Jaxon Examples</title>

    <!-- Bootstrap core CSS -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

<?php
    echo $jaxon->getCss();
?>
<script type='text/javascript'>
    /* <![CDATA[ */
    window.onload = function() {
        // Call the HelloWorld class to populate the 2nd div
        <?php echo xr::call('HelloWorld.sayHello', 0) ?>;
        // call the HelloWorld->setColor() method on load
        <?php echo xr::call('HelloWorld.setColor', xr::select('colorselect')) ?>;
    }
    /* ]]> */
</script>
</head>

<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Jaxon Examples</a>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
<?php require(__DIR__ . '/includes/menu.php') ?>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h3 class="page-header">Plugin Usage</h3>

                <div class="row">
                    <div class="col-sm-6 col-md-6 text">
<p>
This example shows the use of Jaxon plugins, by adding javascript notifications and modal windows to the class.php example with the jaxon-toastr, jaxon-pgwjs and jaxon-bootstrap packages.
</p>
<p>
Using an Jaxon plugin is very simple. After a plugin is installed with Composer, its automatically registers into the Jaxon core library. It can then be accessed both in the Jaxon main object, for configuration, and in the Jaxon response object, to provide additional functionalities to the application.
</p>
                    </div>
                    <div class="col-sm-6 col-md-6 demo">
                        <div style="margin:10px;" id="div2">
                            &nbsp;
                        </div>
                        <div style="margin:10px;">
                            <select class="form-control" id="colorselect" name="colorselect"
                                    onchange="<?php echo xr::call('HelloWorld.setColor', xr::select('colorselect')) ?>; return false;">
                                <option value="black" selected="selected">Black</option>
                                <option value="red">Red</option>
                                <option value="green">Green</option>
                                <option value="blue">Blue</option>
                            </select>
                        </div>
                        <div style="margin:10px;">
                            <button class="btn btn-primary" onclick="<?php echo xr::call('HelloWorld.sayHello', 0) ?>; return false;" >Click Me</button>
                            <button class="btn btn-primary" onclick="<?php echo xr::call('HelloWorld.sayHello', 1) ?>; return false;" >CLICK ME</button>
                        </div>

                        <div style="margin:10px;">
                            <button class="btn btn-primary" onclick="<?php echo xr::call('HelloWorld.showPgwDialog') ?>; return false;" >Show PgwModal Dialog</button>
                            <button class="btn btn-primary" onclick="<?php echo xr::call('HelloWorld.showTbDialog') ?>; return false;" >Show Twitter Bootstrap Dialog</button>
                        </div>
                    </div>
                </div>

                <h4 class="page-header">How it works</h4>

                <div class="row">
                    <div class="col-sm-6 col-md-6 jaxon-export">
<p>The Jaxon class</p>
<pre>
class HelloWorld
{
    public function sayHello($isCaps)
    {
        if ($isCaps)
            $text = 'HELLO WORLD!';
        else
            $text = 'Hello World!';
        $xResponse = new Response();
        $xResponse->assign('div2', 'innerHTML', $text);
        // Call the Toastr plugin
        $xResponse->toastr->success("div2 text is now $text");
        return $xResponse;
    }

    public function setColor($sColor)
    {
        $xResponse = new Response();
        $xResponse->assign('div2', 'style.color', $sColor);
        // Call the Toastr plugin
        $xResponse->toastr->success("div2 color is now $sColor");
        return $xResponse;
    }

    public function showPgwDialog()
    {
        $xResponse = new Response();
        $buttons = array(array('title' => 'Close', 'class' => 'btn', 'click' => 'close'));
        $options = array('maxWidth' => 400);
        // Call the PgwModal plugin
        $xResponse->pgw->modal("Modal Dialog", "This modal dialog is powered by PgwModal!!", $buttons, $options);
        return $xResponse;
    }

    public function showTbDialog()
    {
        $xResponse = new Response();
        $buttons = array(array('title' => 'Close', 'class' => 'btn', 'click' => 'close'));
        $width = 300;
        // Call the Twitter Bootstrap plugin
        $xResponse->bootstrap->modal("Modal Dialog", "This modal dialog is powered by Twitter Bootstrap!!", $buttons, $width);
        return $xResponse;
    }
}
</pre>
                    </div>
                    <div class="col-sm-6 col-md-6 jaxon-code">
<p>The javascript event bindings</p>
<pre>
// Select
&lt;select onchange="JaxonHelloWorld.setColor(xajax.$('colorselect').value); return false;"&gt;
&lt;/select&gt;
// Buttons
&lt;button onclick="JaxonHelloWorld.sayHello(0); return false;"&gt;Click Me&lt;/button&gt;
&lt;button onclick="JaxonHelloWorld.sayHello(1); return false;"&gt;CLICK ME&lt;/button&gt;

&lt;button onclick="JaxonHelloWorld.showPgwDialog(); return false;"&gt;Show PgwModal Dialog&lt;/button&gt;
&lt;button onclick="JaxonHelloWorld.showTbDialog(); return false;"&gt;Show Twitter Bootstrap Dialog&lt;/button&gt;
</pre>

<p>The PHP object registrations</p>
<pre>
$jaxon = Jaxon::getInstance();

// $jaxon->setOption('core.debug.on', true);
$jaxon->setOption('core.prefix.class', 'Jaxon');

$jaxon->setOptions(array(
    'toastr.options.closeButton' => true,
    'toastr.options.closeMethod' => 'fadeOut',
    'toastr.options.closeDuration' => 300,
    'toastr.options.closeEasing' => 'swing',
    'toastr.options.positionClass' => 'toast-bottom-left',
));

$jaxon->setOptions(array(
    'pgw.modal.options.closeOnEscape' => true,
    'pgw.modal.options.closeOnBackgroundClick' => true,
    'pgw.modal.options.maxWidth' => 600,
));

// Register object
$jaxon->register(Jaxon::CALLABLE_OBJECT, new HelloWorld());

// Process the request, if any.
$jaxon->processRequest();
</pre>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.0/js/bootstrap.min.js"></script>
<?php
    echo $jaxon->getJs();
    echo $jaxon->getScript();
?>

<?php require(__DIR__ . '/includes/footer.php') ?>
</body>
</html>
