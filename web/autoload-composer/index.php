<?php

require(__DIR__ . '/defs.php');
require(__DIR__ . '/../../includes/header.php');

$appTest = jaxon()->request(\App\Test\Test::class);
$extTest = jaxon()->request(\Ext\Test\Test::class);

?>

    <div class="container-fluid">
        <div class="row">
<?php require(__DIR__ . '/../../includes/nav.php') ?>
            <div class="col-sm-9 content">
                <h3 class="page-header">Composer Autoloader</h3>

                <div class="row" id="jaxon-html">
                        <div class="col-md-12" id="div1">
                            &nbsp;
                        </div>
                        <div class="col-md-4 margin-vert-10">
                            <select class="form-control" id="colorselect1" name="colorselect1"
                                    onchange="<?php echo $appTest->setColor(pm()->select('colorselect1')) ?>">
                                <option value="black" selected="selected">Black</option>
                                <option value="red">Red</option>
                                <option value="green">Green</option>
                                <option value="blue">Blue</option>
                            </select>
                        </div>
                        <div class="col-md-8 margin-vert-10">
                            <button type="button" class="btn btn-primary" onclick='App.Test.Test.sayHello(1); return false;' >CLICK ME</button>
                            <button type="button" class="btn btn-primary" onclick='App.Test.Test.sayHello(0); return false;' >Click Me</button>
                            <button type="button" class="btn btn-primary" onclick="App.Test.Test.showDialog(); return false;" >PgwModal Dialog</button>
                        </div>

                        <div class="col-md-12" id="div2">
                            &nbsp;
                        </div>
                        <div class="col-md-4 margin-vert-10">
                            <select class="form-control" id="colorselect2" name="colorselect2"
                                    onchange="<?php echo $extTest->setColor(pm()->select('colorselect2')) ?>">
                                <option value="black" selected="selected">Black</option>
                                <option value="red">Red</option>
                                <option value="green">Green</option>
                                <option value="blue">Blue</option>
                            </select>
                        </div>
                        <div class="col-md-8 margin-vert-10">
                            <button type="button" class="btn btn-primary" onclick="Ext.Test.Test.sayHello(1); return false;" >CLICK ME</button>
                            <button type="button" class="btn btn-primary" onclick="Ext.Test.Test.sayHello(0); return false;" >Click Me</button>
                            <button type="button" class="btn btn-primary" onclick="Ext.Test.Test.showDialog(); return false;" >Bootstrap Dialog</button>
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
        App.Test.Test.sayHello(0, false);
        // call the setColor function on load
        App.Test.Test.setColor(jaxon.$('colorselect1').value, false);
        // Call the HelloWorld class to populate the 2nd div
        Ext.Test.Test.sayHello(0, false);
        // call the HelloWorld->setColor() method on load
        Ext.Test.Test.setColor(jaxon.$('colorselect2').value, false);
    }
    /* ]]> */
</script>
</div>

<?php require(__DIR__ . '/../../includes/footer.php') ?>
