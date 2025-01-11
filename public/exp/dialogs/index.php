<?php

require(__DIR__ . '/defs.php');
require(__DIR__ . '/../../../includes/header.php');

use function Jaxon\attr;
use function Jaxon\js;
use function Jaxon\rq;
?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 sidebar">
<?php require(__DIR__ . '/../../../includes/nav.php') ?>
            </div>

            <div class="col-sm-9 content">
<?php require(__DIR__ . '/../../../includes/title.php') ?>

                <div class="row" id="jaxon-html">
<?php foreach($aLibraries as $id => $lib): ?>
                    <div class="col-md-12">
                        <?php echo $lib['name'] ?>
                    </div>
<?php if(is_subclass_of($lib['class'], \Jaxon\App\Dialog\Library\AlertInterface::class)): ?>
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
<?php if(is_subclass_of($lib['class'], \Jaxon\App\Dialog\Library\ConfirmInterface::class)): ?>
                    <div class="col-md-12" style="padding-bottom: 15px;">
                        <button type="button" class="btn btn-primary"
                            onclick="jaxon.confirm('<?php echo $id ?>', { title: 'Confirm', text: 'Really?' }, {
                                yes: () => jaxon.alert('<?php echo $id ?>', { type: 'info', title: 'Info', text: 'Oh! Yeah!!!' }),
                                no: () => jaxon.alert('<?php echo $id ?>', { type: 'warning', title: 'Warning', text: 'So Sorry!!!' }),
                            })" >Confirm</button>
                    </div>
<?php endif ?>
<?php if(is_subclass_of($lib['class'], \Jaxon\App\Dialog\Library\ModalInterface::class)): ?>
                    <div class="col-md-12" style="padding-bottom: 15px;">
                        <button type="button" class="btn btn-primary" <?php
                            echo attr()->click(rq(HelloWorld::class)->showDialog($id, $lib['name'])) ?>>Modal</button>
                    </div>
<?php endif ?>
<?php endforeach ?>

                </div>
            </div> <!-- class="content" -->
       </div> <!-- class="row" -->
    </div>
<div id="jaxon-init">
</div>

<?php require(__DIR__ . '/../../../includes/footer.php') ?>
