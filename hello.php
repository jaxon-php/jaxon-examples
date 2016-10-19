<?php

require (__DIR__ . '/vendor/autoload.php');

use Jaxon\Jaxon;
use Jaxon\Response\Response;
use Jaxon\Request\Factory as xr;

$jaxon = jaxon();

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
                        <div class="col-md-12" id="div1">
                            &nbsp;
                        </div>
                        <div class="col-md-4 margin-vert-10">
                            <select class="form-control" id="colorselect" name="colorselect"
                                    onchange="<?php echo xr::call('setColor', xr::select('colorselect')) ?>; return false;">
                                <option value="black" selected="selected">Black</option>
                                <option value="red">Red</option>
                                <option value="green">Green</option>
                                <option value="blue">Blue</option>
                            </select>
                        </div>
                        <div class="col-md-8 margin-vert-10">
                            <button type="button" class="btn btn-primary" onclick="<?php echo xr::call('helloWorld', 1) ?>; return false;" >CLICK ME</button>
                            <button type="button" class="btn btn-primary" onclick="<?php echo xr::call('helloWorld', 0) ?>; return false;" >Click Me</button>
                        </div>
