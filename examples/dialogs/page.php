<?php

use Jaxon\App\Dialog\Library\AlertInterface;
use Jaxon\App\Dialog\Library\ConfirmInterface;
use Jaxon\App\Dialog\Library\ModalInterface;

use function Jaxon\attr;
use function Jaxon\rq;

$aLibraries = [
    // Alertify
    'alertify'      => [
        'name' => 'Alertify',
        'class' => Jaxon\Dialogs\Dialog\Library\Alertify::class,
    ],
    // Bootbox
    'bootbox'       => [
        'name' => 'Bootbox',
        'class' => Jaxon\Dialogs\Dialog\Library\Bootbox::class,
    ],
    // Quantum
    'quantum'     => [
        'name' => 'Quantum Alert',
        'class' => Jaxon\Dialogs\Dialog\Library\Quantum::class,
    ],
    // Butterup
    'butterup'     => [
        'name' => 'Butterup',
        'class' => Jaxon\Dialogs\Dialog\Library\Butterup::class,
    ],
    // CuteAlert
    'cute'          => [
        'name' => 'CuteAlert',
        'class' => Jaxon\Dialogs\Dialog\Library\CuteAlert::class,
    ],
    // Toastr
    'toastr'        => [
        'name' => 'Toastr',
        'class' => Jaxon\Dialogs\Dialog\Library\Toastr::class,
    ],
    // JAlert
    'jalert'        => [
        'name' => 'JAlert',
        'class' => Jaxon\Dialogs\Dialog\Library\JAlert::class,
    ],
    // Tingle
    'tingle'        => [
        'name' => 'Tingle',
        'class' => Jaxon\Dialogs\Dialog\Library\Tingle::class,
    ],
    // Noty
    'noty'          => [
        'name' => 'Noty',
        'class' => Jaxon\Dialogs\Dialog\Library\Noty::class,
    ],
    // Notyf
    'notyf'         => [
        'name' => 'Notyf',
        'class' => Jaxon\Dialogs\Dialog\Library\Notyf::class,
    ],
    // Notify
    'notify'        => [
        'name' => 'Notify',
        'class' => Jaxon\Dialogs\Dialog\Library\Notify::class,
    ],
    // IziToast
    'izitoast'     => [
        'name' => 'IziToast',
        'class' => Jaxon\Dialogs\Dialog\Library\IziToast::class,
    ],
    // SweetAlert
    'sweetalert'    => [
        'name' => 'SweetAlert',
        'class' => Jaxon\Dialogs\Dialog\Library\SweetAlert::class,
    ],
    // JQuery Confirm
    'jconfirm'      => [
        'name' => 'JQueryConfirm',
        'class' => Jaxon\Dialogs\Dialog\Library\JQueryConfirm::class,
    ],
];
?>
<?php $this->extends('templates::examples/layout.php') ?>

<?php $this->block('content') ?>
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
<?php $this->endblock() ?>
