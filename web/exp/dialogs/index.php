<?php

require(__DIR__ . '/defs.php');
require(__DIR__ . '/../../../includes/header.php')
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
<?php if(is_subclass_of($lib['class'], \Jaxon\App\Dialog\MessageInterface::class)): ?>
                        <div class="col-md-12" style="padding-bottom: 15px;">
                            <button type="button" class="btn btn-primary" onclick="JaxonHelloWorld.showSuccess('<?php
                                echo $id ?>', '<?php echo $lib['name'] ?>')" >Success</button>
                            <button type="button" class="btn btn-primary" onclick="JaxonHelloWorld.showInfo('<?php
                                echo $id ?>', '<?php echo $lib['name'] ?>')" >Info</button>
                            <button type="button" class="btn btn-primary" onclick="JaxonHelloWorld.showWarning('<?php
                                echo $id ?>', '<?php echo $lib['name'] ?>')" >Warning</button>
                            <button type="button" class="btn btn-primary" onclick="JaxonHelloWorld.showError('<?php
                                echo $id ?>', '<?php echo $lib['name'] ?>')" >Error</button>
                        </div>
<?php endif ?>
<?php if(is_subclass_of($lib['class'], \Jaxon\App\Dialog\QuestionInterface::class)): ?>
                        <div class="col-md-12" style="padding-bottom: 15px;">
                            <button type="button" class="btn btn-primary"
                                onclick="jaxon.confirm({ lib: '<?php echo $id ?>', title: 'Question', text: 'Really?' },
                                () => jaxon.alert({ lib: '<?php echo $id ?>', type: 'info', title: 'Info', text: 'Oh! Yeah!!!' }),
                                () => jaxon.alert({ lib: '<?php echo $id ?>', type: 'warning', title: 'Warning', text: 'So Sorry!!!' }))" >Confirm</button>
                        </div>
<?php endif ?>
<?php if(is_subclass_of($lib['class'], \Jaxon\App\Dialog\ModalInterface::class)): ?>
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

<?php require(__DIR__ . '/../../../includes/footer.php') ?>
