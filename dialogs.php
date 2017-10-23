<?php

require (__DIR__ . '/vendor/autoload.php');

use Jaxon\Jaxon;
use Jaxon\Response\Response;

$jaxon = jaxon();

$aLibraries = [
    // Bootbox
    'bootbox'       => ['class' => 'bootbox', 'name' => 'Bootbox'],
    // Bootstrap
    'bootstrap'     => ['class' => 'bootstrap', 'name' => 'Bootstrap'],
    // PgwJS
    'pgwjs'         => ['class' => 'pgwjs', 'name' => 'PgwJS'],
    // Toastr
    'toastr'        => ['class' => 'toastr', 'name' => 'Toastr'],
    // JAlert
    'jalert'        => ['class' => 'jalert', 'name' => 'JAlert'],
    // Tingle
    'tingle'        => ['class' => 'tingle', 'name' => 'Tingle'],
    // SimplyToast
    'simply'        => ['class' => 'simplytoast', 'name' => 'SimplyToast'],
    // Noty
    'noty'          => ['class' => 'noty', 'name' => 'Noty'],
    // Notify
    'notify'        => ['class' => 'notify', 'name' => 'Notify'],
    // Lobibox
    'lobibox'       => ['class' => 'lobibox', 'name' => 'Lobibox'],
    // Overhang
    'overhang'      => ['class' => 'overhang', 'name' => 'Overhang'],
    // PNotify
    'pnotify'       => ['class' => 'pnotify', 'name' => 'PNotify'],
    // SweetAlert
    'sweetalert'    => ['class' => 'swal', 'name' => 'SweetAlert'],
    // JQuery Confirm
    'jconfirm'      => ['class' => 'jconfirm', 'name' => 'JQueryConfirm'],
    // IziModal and IziToast
    'izi-toast'     => ['class' => 'izi', 'name' => 'Izi'],
    // YmzBox
    'ymzbox'        => ['class' => 'ymzbox', 'name' => 'YmzBox'],
];

$jaxon->setOption('dialogs.libraries', array_keys($aLibraries));

class HelloWorld
{
    public function showDialog($id, $name)
    {
        jaxon()->setOption('dialogs.default.modal', $id);
        $xResponse = new Response();
        $buttons = array(array('title' => 'Close', 'class' => 'btn', 'click' => 'close'));
        $options = array();
        $xResponse->dialog->show("Modal Dialog", "This modal dialog is powered by $name!!", $buttons, $options);

        return $xResponse;
    }
}

// Register functions
$jaxon->register(Jaxon::CALLABLE_OBJECT, new HelloWorld());

// Process the request, if any.
$jaxon->processRequest();

require(__DIR__ . '/includes/header.php')
?>

    <div class="container-fluid">
        <div class="row">
<?php require(__DIR__ . '/includes/nav.php') ?>
            <div class="col-sm-9 content">
                <h3 class="page-header"><?php echo $pageTitle ?></h3>

                <div class="row" id="jaxon-html">
<?php foreach($aLibraries as $id => $lib): ?>
<?php $class = 'jaxon.dialogs.' . $lib['class']; $plugin = $jaxon->plugin('dialog')->getLibrary($id); ?>
                        <div class="col-md-12">
                            <?php echo $lib['name'] ?>
                        </div>
<?php if($plugin instanceof \Jaxon\Request\Interfaces\Alert): ?>
                        <div class="col-md-12" style="padding-bottom: 15px;">
                            <button type="button" class="btn btn-primary" onclick="<?php
                                echo $class ?>.success('Yeah Man!!!')" >Success</button>
                            <button type="button" class="btn btn-primary" onclick="<?php
                                echo $class ?>.info('Yeah Man!!!')" >Info</button>
                            <button type="button" class="btn btn-primary" onclick="<?php
                                echo $class ?>.warning('Yeah Man!!!')" >Warning</button>
                            <button type="button" class="btn btn-primary" onclick="<?php
                                echo $class ?>.error('Yeah Man!!!')" >Error</button>
                        </div>
<?php endif ?>
<?php if($plugin instanceof \Jaxon\Request\Interfaces\Confirm): ?>
                        <div class="col-md-12" style="padding-bottom: 15px;">
                            <button type="button" class="btn btn-primary" onclick="<?php
                                echo $class ?>.confirm('Really?', 'Question', function(){<?php
                                echo $class ?>.info('Oh! Yeah!!!');}, function(){<?php
                                echo $class ?>.info('So Sorry!!!');})" >Confirm</button>
                        </div>
<?php endif ?>
<?php if($plugin instanceof \Jaxon\Dialogs\Interfaces\Modal): ?>
                        <div class="col-md-12" style="padding-bottom: 15px;">
                            <button type="button" class="btn btn-primary" onclick="JaxonHelloWorld.showDialog('<?php
                                echo $id ?>', '<?php echo $lib['name'] ?>')" >Modal</button>
                        </div>
<?php endif ?>
<?php endforeach ?>

                </div>
            </div> <!-- class="content" -->
       </div> <!-- class="row" -->
    </div>
<div id="jaxon-init">
</div>

<?php require(__DIR__ . '/includes/footer.php') ?>
