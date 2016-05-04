<?php

require (__DIR__ . '/vendor/autoload.php');

use Xajax\Xajax;
use Xajax\Response\Response;
use Xajax\Request\Factory as xr;

$xajax = Xajax::getInstance();

$xajax->setOption('core.debug.on', false);
$xajax->setOption('core.prefix.function', 'xajax_');

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

// Register functions
$hello = new HelloWorld();
$xajax->register(Xajax::USER_FUNCTION, array('helloWorld', $hello, 'sayHello'));
$xajax->register(Xajax::USER_FUNCTION, array($hello, 'setColor'));

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
	echo $xajax->getCssInclude();
?>
<script type='text/javascript'>
	/* <![CDATA[ */
	window.onload = function() {
		// Call the HelloWorld class to populate the 2nd div
		<?php echo xr::make('helloWorld', 0) ?>;
		// call the HelloWorld->setColor() method on load
		<?php echo xr::make('setColor', xr::select('colorselect')) ?>;
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
				<h3 class="page-header">Hello World Alias</h3>

				<div class="row">
					<div class="col-sm-6 col-md-6 text">
<p>
This example shows how to export the methods of a class as functions with Xajax, using aliases.
</p>
					</div>
					<div class="col-sm-6 col-md-6 demo">
						<div style="margin:10px;" id="div2">
							&nbsp;
						</div>
						<div style="margin:10px;">
							<select class="form-control" id="colorselect" name="colorselect"
									onchange="<?php echo xr::make('setColor', xr::select('colorselect')) ?>; return false;">
								<option value="black" selected="selected">Black</option>
								<option value="red">Red</option>
								<option value="green">Green</option>
								<option value="blue">Blue</option>
							</select>
						</div>
						<div style="margin:10px;">
							<button class="btn btn-primary" onclick="<?php echo xr::make('helloWorld', 0) ?>; return false;" >Click Me</button>
							<button class="btn btn-primary" onclick="<?php echo xr::make('helloWorld', 1) ?>; return false;" >CLICK ME</button>
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
&lt;select onchange="xajax_setColor(xajax.$('colorselect').value); return false;"&gt;
&lt;/select&gt;
// Buttons
&lt;button onclick="xajax_helloWorld(0); return false;"&gt;Click Me&lt;/button&gt;
&lt;button onclick="xajax_helloWorld(1); return false;"&gt;CLICK ME&lt;/button&gt;
</pre>

<p>The PHP object registrations</p>
<pre>
$xajax = Xajax::getInstance();

$xajax->setOption('core.debug.on', false);
$xajax->setOption('core.prefix.function', 'xajax_');

// Register class methods as Xajax functions
$hello = new HelloWorld();
$xajax->register(Xajax::USER_FUNCTION, array('helloWorld', $hello, 'sayHello'));
$xajax->register(Xajax::USER_FUNCTION, array($hello, 'setColor'));

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
	echo $xajax->getJsInclude();
	echo $xajax->getJavascript();
?>
</body>
</html>
