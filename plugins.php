<?php

require (__DIR__ . '/vendor/autoload.php');

use Jaxon\Jaxon;
use Jaxon\Response\Response;

$jaxon = jaxon();

// $jaxon->setOption('core.debug.on', true);
$jaxon->setOption('core.prefix.class', 'Jaxon');

// Js options
// $jaxon->setOption('js.lib.uri', '/exp/js/lib');
// $jaxon->setOption('js.app.minify', false);

// Dialog options
$jaxon->setOption('dialogs.default.modal', 'bootbox');
$jaxon->setOption('dialogs.default.alert', 'ymzbox');
$jaxon->setOption('dialogs.default.confirm', 'ymzbox');

$jaxon->setOption('dialogs.confirm.title', 'Confirmer');
$jaxon->setOption('dialogs.confirm.yes', 'Oui');
$jaxon->setOption('dialogs.confirm.no', 'Non');

$jaxon->setOption('dialogs.toastr.options.closeButton', true);
$jaxon->setOption('dialogs.toastr.options.positionClass', 'toast-top-center');
$jaxon->setOption('dialogs.pnotify.options.styling', 'bootstrap3');
$jaxon->setOption('dialogs.pgwjs.options.modal.maxWidth', 800);

$jaxon->plugin('dialog')->registerClasses();

class HelloWorld
{
    public function sayHello($isCaps, $bNotify = true)
    {
        $text = ($isCaps ? 'HELLO WORLD!': 'Hello World!');
        $xResponse = new Response();
        if(($bNotify))
        {
            // $xResponse->confirmCommands(2, 'Skip text assignement?');
            $xResponse->assign('div2', 'innerHTML', $text);
            // $xResponse->confirmCommands(1, 'Skip text notification?');
            $xResponse->dialog->success("div2 text is now $text");
        }
        else
        {
            // $xResponse->confirmCommands(1, 'Skip text assignement?');
            $xResponse->assign('div2', 'innerHTML', $text);
        }

        return $xResponse;
    }

    public function setColor($sColor, $bNotify = true)
    {
        $xResponse = new Response();
        if(($bNotify))
        {
            // $xResponse->confirmCommands(1, 'Skip color assignement?');
            $xResponse->assign('div2', 'style.color', $sColor);
            // $xResponse->confirmCommands(1, 'Skip color assignement?');
            $xResponse->dialog->success("div2 color is now $sColor");
        }
        else
        {
            // $xResponse->confirmCommands(1, 'Skip color assignement?');
            $xResponse->assign('div2', 'style.color', $sColor);
        }

        return $xResponse;
    }

    public function showDialog()
    {
        $xResponse = new Response();
        $buttons = array(array('title' => 'Close', 'class' => 'btn', 'click' => 'close'));
        $options = array('width' => 500);
        $xResponse->dialog->show("Modal Dialog", "This modal dialog is powered by Bootbox!!", $buttons, $options);

        return $xResponse;
    }
}

// Register object
$jaxon->register(Jaxon::CALLABLE_OBJECT, new HelloWorld());

// Process the request, if any.
$jaxon->processRequest();

$color = jq('#colorselect')->val();
require(__DIR__ . '/includes/header.php')
?>

    <div class="container-fluid">
        <div class="row">
<?php require(__DIR__ . '/includes/nav.php') ?>
            <div class="col-sm-9 content">
                <h3 class="page-header"><?php echo $pageTitle ?></h3>

                <div class="row" id="jaxon-html">
                        <div class="col-md-12" id="div2">
                            &nbsp;
                        </div>
                        <div class="col-md-4 margin-vert-10">
                            <select class="form-control" id="colorselect" name="colorselect"
                                    onchange="<?php echo rq()->call('HelloWorld.setColor', $color)->confirm('Set color to {1}?', $color) ?>">
                                <option value="black" selected="selected">Black</option>
                                <option value="red">Red</option>
                                <option value="green">Green</option>
                                <option value="blue">Blue</option>
                            </select>
                        </div>
                        <div class="col-md-8 margin-vert-10">
                            <button type="button" class="btn btn-primary" onclick="<?php echo rq()->call('HelloWorld.sayHello', 1)
                                ->confirm('Sure?') ?>" >CLICK ME</button>
                            <button type="button" class="btn btn-primary" onclick="<?php echo rq()->call('HelloWorld.sayHello', 0)
                                ->confirm('Sure?') ?>" >Click Me</button>
                            <button type="button" class="btn btn-primary" onclick="<?php echo rq()->call('HelloWorld.showDialog')
                                ->confirm('Sure?') ?>" >Show Dialog</button>
                        </div>

                </div>
            </div> <!-- class="content" -->
       </div> <!-- class="row" -->
    </div>
<div id="jaxon-init">
<script type='text/javascript'>
    /* <![CDATA[ */
    window.onload = function() {
        // Call the HelloWorld class to populate the 2nd div
        <?php echo rq()->call('HelloWorld.sayHello', 0, false) ?>;
        // call the HelloWorld->setColor() method on load
        <?php echo rq()->call('HelloWorld.setColor', rq()->select('colorselect'), false) ?>;
    }
    /* ]]> */
</script>
</div>

<?php require(__DIR__ . '/includes/footer.php') ?>
