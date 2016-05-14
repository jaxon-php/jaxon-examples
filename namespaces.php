<?php

require (__DIR__ . '/vendor/autoload.php');

use Xajax\Xajax;
use Xajax\Response\Response;

$xajax = Xajax::getInstance();

// $xajax->setOption('core.debug.on', true);
$xajax->setOption('core.prefix.class', '');

$xajax->setOption('toastr.options.closeButton', true);
$xajax->setOption('toastr.options.positionClass', 'toast-bottom-left');

// Add class dirs with namespaces
$xajax->addClassDir(__DIR__ . '/classes/namespace/app', 'App');
$xajax->addClassDir(__DIR__ . '/classes/namespace/ext', 'Ext');

// Register objects
$xajax->registerClasses();

// Process the request, if any.
$xajax->processRequest();

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

	<title>Xajax Examples</title>

	<!-- Bootstrap core CSS -->
	<link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="css/style.css" rel="stylesheet">

<?php
	echo $xajax->getCss();
?>
<script type='text/javascript'>
	/* <![CDATA[ */
	window.onload = function() {
		// call the helloWorld function to populate the div on load
		App.Test.Test.sayHello(0);
		// call the setColor function on load
		App.Test.Test.setColor(xajax.$('colorselect1').value);
		// Call the HelloWorld class to populate the 2nd div
		Ext.Test.Test.sayHello(0);
		// call the HelloWorld->setColor() method on load
		Ext.Test.Test.setColor(xajax.$('colorselect2').value);
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
				<a class="navbar-brand" href="#">Xajax Examples</a>
			</div>
		</div>
	</nav>

	<div class="container-fluid">
		<div class="row">
<?php require(__DIR__ . '/includes/menu.php') ?>
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				<h3 class="page-header">Register Namespaces</h3>

				<div class="row">
					<div class="col-sm-6 col-md-6 text">
<p>
This example shows how to automatically register all the classes in a set of directories with namespaces.
</p>
<p>
The namespace is prepended to the generated javascript class names, and PHP classes in different subdirs can have the same name.
</p>
					</div>
					<div class="col-sm-6 col-md-6 demo">
						<div style="margin:10px;" id="div1">
							&nbsp;
						</div>
						<div style="margin:10px;">
							<select class="form-control" id="colorselect1" name="colorselect1"
									onchange="App.Test.Test.setColor(xajax.$('colorselect1').value); return false;">
								<option value="black" selected="selected">Black</option>
								<option value="red">Red</option>
								<option value="green">Green</option>
								<option value="blue">Blue</option>
							</select>
						</div>
						<div style="margin:10px;">
							<button class="btn btn-primary" onclick='App.Test.Test.sayHello(0); return false;' >Click Me</button>
							<button class="btn btn-primary" onclick='App.Test.Test.sayHello(1); return false;' >CLICK ME</button>
							<button class="btn btn-primary" onclick="App.Test.Test.showDialog(); return false;" >Show PgwModal Dialog</button>
						</div>

						<div style="margin:10px;" id="div2">
							&nbsp;
						</div>
						<div style="margin:10px;">
							<select class="form-control" id="colorselect2" name="colorselect2"
									onchange="Ext.Test.Test.setColor(xajax.$('colorselect2').value); return false;">
								<option value="black" selected="selected">Black</option>
								<option value="red">Red</option>
								<option value="green">Green</option>
								<option value="blue">Blue</option>
							</select>
						</div>
						<div style="margin:10px;">
							<button class="btn btn-primary" onclick="Ext.Test.Test.sayHello(0); return false;" >Click Me</button>
							<button class="btn btn-primary" onclick="Ext.Test.Test.sayHello(1); return false;" >CLICK ME</button>
							<button class="btn btn-primary" onclick="Ext.Test.Test.showDialog(); return false;" >Show Twitter Bootstrap Dialog</button>
						</div>
					</div>
				</div>

				<h4 class="page-header">How it works</h4>

				<div class="row">
					<div class="col-sm-6 col-md-6 xajax-export">
<p>The Xajax class in the file ./classes/namespace/app/Test/Test.php</p>
<pre>
namespace App\Test;

use Xajax\Response\Response;

class Test
{
    public function sayHello($isCaps)
    {
        if ($isCaps)
            $text = 'HELLO WORLD!';
        else
            $text = 'Hello World!';
        $xResponse = new Response();
        $xResponse->assign('div1', 'innerHTML', $text);
        $xResponse->toastr->success("div1 text is now $text");
        return $xResponse;
    }

    public function setColor($sColor)
    {
        $xResponse = new Response();
        $xResponse->assign('div1', 'style.color', $sColor);
        $xResponse->toastr->success("div1 color is now $sColor");
        return $xResponse;
    }

    public function showDialog()
    {
        $xResponse = new Response();
        $buttons = array(array('title' => 'Close', 'class' => 'btn', 'click' => 'close'));
        $options = array('maxWidth' => 400);
        $xResponse->pgwModal->show("Modal Dialog", "This modal dialog is powered by PgwModal!!", $buttons, $options);
        return $xResponse;
    }
}
</pre>

<p>The Xajax class in the file ./classes/namespace/ext/Test/Test.php</p>
<pre>
namespace Ext\Test;

use Xajax\Response\Response;

class Test
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

    public function showDialog()
    {
        $xResponse = new Response();
        $buttons = array(array('title' => 'Close', 'class' => 'btn', 'click' => 'close'));
        $width = 300;
        $xResponse->twbs->show("Modal Dialog", "This modal dialog is powered by Twitter Bootstrap!!", $buttons, $width);
        return $xResponse;
    }
}
</pre>
					</div>
					<div class="col-sm-6 col-md-6 xajax-code">
<p>The javascript event bindings</p>
<pre>
// Select
&lt;select onchange="App.Test.Test.setColor(xajax.$('colorselect').value); return false;"&gt;
&lt;/select&gt;

// Buttons
&lt;button onclick="App.Test.Test.sayHello(0); return false;"&gt;Click Me&lt;/button&gt;
&lt;button onclick="App.Test.Test.sayHello(1); return false;"&gt;CLICK ME&lt;/button&gt;

// Select
&lt;select onchange="Ext.Test.Test.setColor(xajax.$('colorselect').value); return false;"&gt;
&lt;/select&gt;

// Buttons
&lt;button onclick="Ext.Test.Test.sayHello(0); return false;"&gt;Click Me&lt;/button&gt;
&lt;button onclick="Ext.Test.Test.sayHello(1); return false;"&gt;CLICK ME&lt;/button&gt;

&lt;button onclick="App.Test.Test.showDialog(); return false;"&gt;Show PgwModal Dialog&lt;/button&gt;
&lt;button onclick="Ext.Test.Test.showDialog(); return false;"&gt;Show Twitter Bootstrap Dialog&lt;/button&gt;
</pre>

<p>The PHP object registrations</p>
<pre>
$xajax = Xajax::getInstance();

// $xajax->setOption('core.debug.on', true);
$xajax->setOption('core.prefix.class', '');

// Add class dirs with namespaces
$xajax->addClassDir(__DIR__ . '/classes/namespace/app', 'App');
$xajax->addClassDir(__DIR__ . '/classes/namespace/ext', 'Ext');

// Register objects
$xajax->registerClasses();

// Process the request, if any.
$xajax->processRequest();
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
	echo $xajax->getJs();
	echo $xajax->getScript();
?>
</body>
</html>
