<?php

require (__DIR__ . '/vendor/autoload.php');

use Xajax\Xajax;
use Xajax\Response\Response;
use Xajax\Request\Factory as xr;

$xajax = Xajax::getInstance();

// $xajax->setOption('core.debug.on', true);
$xajax->setOption('core.prefix.class', 'Xajax');

$xajaxAppDir = __DIR__ . '/js/deferred';
$xajaxAppURI = 'js/deferred';
$xajax->exportJavascript($xajaxAppDir, $xajaxAppURI);

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

		return $xResponse;
	}

	public function setColor($sColor)
	{
		$xResponse = new Response();
		$xResponse->assign('div2', 'style.color', $sColor);

		return $xResponse;
	}
}

// Register object
$xajax->register(Xajax::CALLABLE_OBJECT, new HelloWorld());

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
		// Call the HelloWorld class to populate the 2nd div
		<?php echo xr::make('HelloWorld.sayHello', 0) ?>;
		// call the HelloWorld->setColor() method on load
		<?php echo xr::make('HelloWorld.setColor', xr::select('colorselect')) ?>;
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
				<h3 class="page-header">Merge Javascript</h3>

				<div class="row">
					<div class="col-sm-6 col-md-6 text">
<p>
This example shows how to export the generated javascript code in an external file, which is then loaded into the webpage.
</p>
<p>
You'll need to make sure the target directory exists and adapt the parameters of the call mergeJavascript() function to your webserver configuration for this example to work.
</p>
<p>
The compression of the generated javascript code is not yet implemented.
</p>
					</div>
					<div class="col-sm-6 col-md-6 demo">
						<div style="margin:10px;" id="div2">
							&nbsp;
						</div>
						<div style="margin:10px;">
							<select class="form-control" id="colorselect" name="colorselect"
								onchange="<?php echo xr::make('HelloWorld.setColor', xr::select('colorselect')) ?>; return false;">
								<option value="black" selected="selected">Black</option>
								<option value="red">Red</option>
								<option value="green">Green</option>
								<option value="blue">Blue</option>
							</select>
						</div>
						<div style="margin:10px;">
							<button class="btn btn-primary" onclick="<?php echo xr::make('HelloWorld.sayHello', 0) ?>; return false;" >Click Me</button>
							<button class="btn btn-primary" onclick="<?php echo xr::make('HelloWorld.sayHello', 1) ?>; return false;" >CLICK ME</button>
						</div>
					</div>
				</div>

				<h4 class="page-header">How it works</h4>

				<div class="row">
					<div class="col-sm-6 col-md-6 xajax-export">
<p>The Xajax class</p>
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

        return $xResponse;
    }

    public function setColor($sColor)
    {
        $xResponse = new Response();
        $xResponse->assign('div2', 'style.color', $sColor);

        return $xResponse;
    }
}
</pre>
					</div>
					<div class="col-sm-6 col-md-6 xajax-code">
<p>The javascript event bindings</p>
<pre>
// Select
&lt;select onchange="XajaxHelloWorld.setColor(xajax.$('colorselect').value); return false;"&gt;
&lt;/select&gt;
// Buttons
&lt;button onclick="XajaxHelloWorld.sayHello(0); return false;"&gt;Click Me&lt;/button&gt;
&lt;button onclick="XajaxHelloWorld.sayHello(1); return false;"&gt;CLICK ME&lt;/button&gt;
</pre>

<p>The PHP object registrations</p>
<pre>
$xajax = Xajax::getInstance();

// $xajax->setOption('core.debug.on', true);
$xajax->setOption('core.prefix.class', 'Xajax');

$xajaxAppURI = 'js/deferred';
$xajaxAppDir = __DIR__ . '/js/deferred';
$xajax->mergeJavascript($xajaxAppURI, $xajaxAppDir);

// Register object
$xajax->register(Xajax::CALLABLE_OBJECT, new HelloWorld());

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
