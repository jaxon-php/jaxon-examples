<?php

require(__DIR__ . '/defs.php');
require(__DIR__ . '/../../includes/header.php')
?>

    <div class="container-fluid">
        <div class="row">
<?php require(__DIR__ . '/../../includes/nav.php') ?>
            <div class="col-sm-9 content">
                <h3 class="page-header">Modal, Alert and Confirm Dialogs</h3>

                <div class="row" id="jaxon-html">
<?php foreach($aLibraries as $id => $lib): ?>
<?php $class = 'jaxon.dialogs.' . $lib['id']; ?>
                        <div class="col-md-12">
                            <?php echo $lib['name'] ?>
                        </div>
<?php if(is_subclass_of($lib['class'], \Jaxon\Ui\Dialog\MessageInterface::class)): ?>
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
<?php if(is_subclass_of($lib['class'], \Jaxon\Ui\Dialog\QuestionInterface::class)): ?>
                        <div class="col-md-12" style="padding-bottom: 15px;">
                            <button type="button" class="btn btn-primary" onclick="<?php
                                echo $class ?>.confirm('Really?', 'Question', function(){<?php
                                echo $class ?>.info('Oh! Yeah!!!');}, function(){<?php
                                echo $class ?>.info('So Sorry!!!');})" >Confirm</button>
                        </div>
<?php endif ?>
<?php if(is_subclass_of($lib['class'], \Jaxon\Ui\Dialog\ModalInterface::class)): ?>
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

<?php require(__DIR__ . '/../../includes/footer.php') ?>
