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
    <link href="/examples/css/style.css" rel="stylesheet">
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
                <h3 class="page-header">Jaxon Examples</h3>

                <div class="row">
<p>
All examples are variants of the helloword.php example in the original Jaxon repository at
<a href="https://github.com/Jaxon/Jaxon/blob/master/examples/helloworld.php" target="_blank">
https://github.com/Jaxon/Jaxon/blob/master/examples/helloworld.php</a>.
</p>

<h5 style="margin-top:15px;"><a href="hello.php">Hello World Function</a></h5>
<p>
This example shows how to export a function with Jaxon.
</p>

<h5 style="margin-top:15px;"><a href="class.php">Hello World Class</a></h5>
<p>
This example shows how to export a class with Jaxon.
</p>

<h5 style="margin-top:15px;"><a href="merge.php">Merge Javascript</a></h5>
<p>
This example shows how to export the generated javascript code in an external file, which is then loaded into the webpage.
</p>
<p>
You'll need to adapt the parameters of the call mergeJavascript() function to your webserver configuration for this example to work.
</p>

<h5 style="margin-top:15px;"><a href="plugins.php">Plugin Usage</a></h5>
<p>
The example shows the use of Jaxon plugins, by adding javascript notifications and modal windows to the class.php
example with the jaxon-toastr, jaxon-pgwjs and jaxon-bootstrap packages.
</p>
<p>
Using an Jaxon plugin is very simple. After a plugin is installed with Composer, its automatically registers into
the Jaxon core library. It can then be accessed both in the Jaxon main object, for configuration, and in the Jaxon
response object, to provide additional functionalities to the application.
</p>

<h5 style="margin-top:15px;"><a href="classdirs.php">Register Directories</a></h5>
<p>
This example shows how to automatically register all the PHP classes in a set of directories.
</p>
<p>
The classes in this example are not namespaced, thus they all need to have different names, even if they are in different subdirs.
</p>

<h5 style="margin-top:15px;"><a href="namespaces.php">Register Namespaces</a></h5>
<p>
This example shows how to automatically register all the classes in a set of directories with namespaces.
</p>
<p>
The namespace is prepended to the generated javascript class names, and PHP classes in different subdirs can have the same name.
</p>

<h5 style="margin-top:15px;"><a href="autoload-default.php">Default Autoloader</a></h5>
<p>
This example shows how to optimize Jaxon requests processing with autoloading.
</p>
<p>
In this example, the Jaxon classes are not registered when processing a request.
However, the Jaxon library is smart enough to detect that the required class is missing, and load only the necessary file.
</p>

<h5 style="margin-top:15px;"><a href="autoload-composer.php">Composer Autoloader</a></h5>
<p>
This example illustrates the use of the Composer autoloader.
</p>
<p>
By default, the Jaxon library implements a simple autoloading mechanism by require_once'ing the corresponding PHP file
for each missing class.
When provided with the Composer autoloader, the Jaxon library registers all directories with a namespace
into the PSR-4 autoloader, and it registers all the classes in directories with no namespace into the classmap autoloader.
</p>

<h5 style="margin-top:15px;"><a href="autoload-disabled.php">Third Party Autoloader</a></h5>
<p>
In this example the autoloading is disabled in the Jaxon library.
</p>
<p>
A third-party autoloader is used to load the Jaxon classes.
</p>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.0/js/bootstrap.min.js"></script>

<?php require(__DIR__ . '/includes/footer.php') ?>
</body>
</html>
