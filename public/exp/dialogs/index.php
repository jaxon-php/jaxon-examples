<?php

require __DIR__ . '/defs.php';
require dirname(__DIR__, 3) . '/includes/header.php';

use Jaxon\App\Dialog\Library\AlertInterface;
use Jaxon\App\Dialog\Library\ConfirmInterface;
use Jaxon\App\Dialog\Library\ModalInterface;
use Jaxon\Dialogs\Dialog\Library\Alertify;
use Jaxon\Dialogs\Dialog\Library\Bootbox;
use Jaxon\Dialogs\Dialog\Library\Bootstrap;
use Jaxon\Dialogs\Dialog\Library\CuteAlert;
use Jaxon\Dialogs\Dialog\Library\Toastr;
use Jaxon\Dialogs\Dialog\Library\JAlert;
use Jaxon\Dialogs\Dialog\Library\Tingle;
use Jaxon\Dialogs\Dialog\Library\Noty;
use Jaxon\Dialogs\Dialog\Library\Notify;
use Jaxon\Dialogs\Dialog\Library\SweetAlert;
use Jaxon\Dialogs\Dialog\Library\JQueryConfirm;

use function Jaxon\attr;
use function Jaxon\rq;

$aLibraries = [
    // Alertify
    'alertify'      => ['class' => Alertify::class, 'id' => 'alertify', 'name' => 'Alertify'],
    // Bootbox
    'bootbox'       => ['class' => Bootbox::class, 'id' => 'bootbox', 'name' => 'Bootbox'],
    // Bootstrap
    // 'bootstrap'     => ['class' => Bootstrap::class, 'id' => 'bootstrap', 'name' => 'Bootstrap'],
    // CuteAlert
    'cute'          => ['class' => CuteAlert::class, 'id' => 'cute', 'name' => 'CuteAlert'],
    // Toastr
    'toastr'        => ['class' => Toastr::class, 'id' => 'toastr', 'name' => 'Toastr'],
    // JAlert
    'jalert'        => ['class' => JAlert::class, 'id' => 'jalert', 'name' => 'JAlert'],
    // Tingle
    'tingle'        => ['class' => Tingle::class, 'id' => 'tingle', 'name' => 'Tingle'],
    // Noty
    'noty'          => ['class' => Noty::class, 'id' => 'noty', 'name' => 'Noty'],
    // Notify
    'notify'        => ['class' => Notify::class, 'id' => 'notify', 'name' => 'Notify'],
    // SweetAlert
    'sweetalert'    => ['class' => SweetAlert::class, 'id' => 'sweetalert', 'name' => 'SweetAlert'],
    // JQuery Confirm
    'jconfirm'      => ['class' => JQueryConfirm::class, 'id' => 'jconfirm', 'name' => 'JQueryConfirm'],
];
?>

    <div class="container-fluid">
<?php require dirname(__DIR__, 3) . '/includes/nav.php' ?>

        <div class="row">
            <div class="col-md-4 exp-form">
<?php require dirname(__DIR__, 3) . '/includes/title.php' ?>

                <div class="row">
<?php foreach($aLibraries as $id => $lib): ?>
                    <div class="col-md-12">
                        <?php echo $lib['name'] ?>
                    </div>
<?php if(is_subclass_of($lib['class'], AlertInterface::class)): ?>
                    <div class="col-md-12" style="padding-bottom: 15px;">
                        <button type="button" class="btn btn-primary" <?php
                            echo attr()->click(rq(HelloWorld::class)->showSuccess($id, $lib['name'])) ?>>Success</button>
                        <button type="button" class="btn btn-primary" <?php
                            echo attr()->click(rq(HelloWorld::class)->showInfo($id, $lib['name'])) ?>>Info</button>
                        <button type="button" class="btn btn-primary" <?php
                            echo attr()->click(rq(HelloWorld::class)->showWarning($id, $lib['name'])) ?>>Warning</button>
                        <button type="button" class="btn btn-primary" <?php
                            echo attr()->click(rq(HelloWorld::class)->showError($id, $lib['name'])) ?>>Error</button>
                    </div>
<?php endif ?>
<?php if(is_subclass_of($lib['class'], ConfirmInterface::class)): ?>
                    <div class="col-md-12" style="padding-bottom: 15px;">
                        <button type="button" class="btn btn-primary"
                            onclick="jaxon.confirm('<?php echo $id ?>', { title: 'Confirm', text: 'Really?' }, {
                                yes: () => jaxon.alert('<?php echo $id ?>', { type: 'info', title: 'Info', text: 'Oh! Yeah!!!' }),
                                no: () => jaxon.alert('<?php echo $id ?>', { type: 'warning', title: 'Warning', text: 'So Sorry!!!' }),
                            })" >Confirm</button>
                    </div>
<?php endif ?>
<?php if(is_subclass_of($lib['class'], ModalInterface::class)): ?>
                    <div class="col-md-12" style="padding-bottom: 15px;">
                        <button type="button" class="btn btn-primary" <?php
                            echo attr()->click(rq(HelloWorld::class)->showDialog($id, $lib['name'])) ?>>Modal</button>
                    </div>
<?php endif ?>
<?php endforeach ?>
                </div>
            </div> <!-- class="exp-form" -->

            <div class="col-md-8 exp-code">
<?php require dirname(__DIR__, 3) . '/includes/code.php' ?>
            </div>
       </div> <!-- class="row" -->
    </div>


<?php require dirname(__DIR__, 3) . '/includes/footer.php' ?>
