<?php

require (__DIR__ . '/vendor/autoload.php');

use Jaxon\Jaxon;
use Jaxon\Response\Response;
use Jaxon\Request\Factory as xr;

$jaxon = Jaxon::getInstance();

$jaxon->setOption('core.debug.on', false);
$jaxon->setOption('core.prefix.function', 'jaxon_');

/*
    Function: helloWorld
    
    Modify the innerHTML of div1.
*/
function helloWorld($isCaps)
{
    if ($isCaps)
        $text = 'HELLO WORLD!';
    else
        $text = 'Hello World!';
        
    $xResponse = new Response();
    $xResponse->assign('div1', 'innerHTML', $text);
    
    return $xResponse;
}

/*
    Function: setColor
    
    Modify the style.color of div1
*/
function setColor($sColor)
{
    $xResponse = new Response();
    $xResponse->assign('div1', 'style.color', $sColor);
    
    return $xResponse;
}

// Register functions
$jaxon->register(Jaxon::USER_FUNCTION, 'helloWorld');
$jaxon->register(Jaxon::USER_FUNCTION, 'setColor');

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
        // call the helloWorld function to populate the div on load
        <?php echo xr::call('helloWorld', 0) ?>;
        // call the setColor function on load
        <?php echo xr::call('setColor', xr::select('colorselect')) ?>;
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
                <h3 class="page-header">Hello World Function</h3>

                <div class="row">
                    <div class="col-sm-6 col-md-6 text">
<p>
This example shows how to export a function with Jaxon.
</p>
                    </div>
                    <div class="col-sm-6 col-md-6 demo">
                        <div style="margin:10px;" id="div1">
                            &nbsp;
                        </div>
                        <div style="margin:10px;">
                            <select class="form-control" id="colorselect" name="colorselect"
                                    onchange="<?php echo xr::call('setColor', xr::select('colorselect')) ?>; return false;">
                                <option value="black" selected="selected">Black</option>
                                <option value="red">Red</option>
                                <option value="green">Green</option>
                                <option value="blue">Blue</option>
                            </select>
                        </div>
                        <div style="margin:10px;">
                            <button class="btn btn-primary" onclick="<?php echo xr::call('helloWorld', 0) ?>; return false;" >Click Me</button>
                            <button class="btn btn-primary" onclick="<?php echo xr::call('helloWorld', 1) ?>; return false;" >CLICK ME</button>
                        </div>
                    </div>
                </div>

                <h4 class="page-header">How it works</h4>

                <div class="row">
                    <div class="col-sm-6 col-md-6 jaxon">
<p>The Jaxon functions</p>
<pre>
function helloWorld($isCaps)
{
    if ($isCaps)
        $text = 'HELLO WORLD!';
    else
        $text = 'Hello World!';

    $xResponse = new Response();
    $xResponse->assign('div1', 'innerHTML', $text);

    return $xResponse;
}

function setColor($sColor)
{
    $xResponse = new Response();
    $xResponse->assign('div1', 'style.color', $sColor);

    return $xResponse;
}
</pre>
                    </div>
                    <div class="col-sm-6 col-md-6 jaxon-code">
<p>The javascript event bindings</p>
<pre>
// Select
&lt;select onchange="jaxon_setColor(xajax.$('colorselect').value); return false;"&gt;
&lt;/select&gt;
// Buttons
&lt;button onclick="jaxon_helloWorld(0); return false;"&gt;Click Me&lt;/button&gt;
&lt;button onclick="jaxon_helloWorld(1); return false;"&gt;CLICK ME&lt;/button&gt;
</pre>

<p>The PHP function registrations</p>
<pre>
$jaxon = Jaxon::getInstance();

// $jaxon->setOption('core.debug.on', true);
$jaxon->setOption('core.prefix.class', 'jaxon_');

// Register functions
$jaxon->register(Jaxon::USER_FUNCTION, 'helloWorld');
$jaxon->register(Jaxon::USER_FUNCTION, 'setColor');

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
