<?php

require (__DIR__ . '/vendor/autoload.php');

use Jaxon\Jaxon;
use Jaxon\Response\Response;
use Jaxon\Request\Factory as xr;

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
$jaxon = jaxon();

$jaxon->readConfigFile(__DIR__ . '/config/class.php', 'lib');

$jaxon->register(Jaxon::CALLABLE_OBJECT, new HelloWorld());

// Process the request, if any.
$jaxon->processRequest();

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
                        <div class="col-md-12" id="div2">
                            &nbsp;
                        </div>
                        <div class="col-md-4 margin-vert-10">
                            <select class="form-control" id="colorselect" name="colorselect"
                                    onchange="<?php echo xr::call('HelloWorld.setColor', xr::select('colorselect')) ?>; return false;">
                                <option value="black" selected="selected">Black</option>
                                <option value="red">Red</option>
                                <option value="green">Green</option>
                                <option value="blue">Blue</option>
                            </select>
                        </div>
                        <div class="col-md-8 margin-vert-10">
                            <button type="button" class="btn btn-primary" onclick="<?php echo xr::call('HelloWorld.sayHello', 1) ?>; return false;" >CLICK ME</button>
                            <button type="button" class="btn btn-primary" onclick="<?php echo xr::call('HelloWorld.sayHello', 0) ?>; return false;" >Click Me</button>
                        </div>
