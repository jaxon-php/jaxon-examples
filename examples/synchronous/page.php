<?php $this->extends('templates::examples/layout.php') ?>

<?php
use function Jaxon\rq;
?>

<?php $this->block('content') ?>
                <div class="row">
                    <div class="col-md-12" id="div2">
                        &nbsp;
                    </div>
                    <div class="col-md-12 buttons">
                        <button type="button" class="btn btn-primary" onclick="testSyncRequests()" >Test sync</button>
                        <button type="button" class="btn btn-primary" onclick="testNodupRequests()" >Test nodup</button>
                    </div>
                </div>
<?php $this->endblock() ?>

<?php $this->block('code') ?>
                <div class="card code">
                    <div class="card-body">
                        <?= highlight_file(__DIR__ . '/code.php', true) ?>
                    </div>
                </div>
<?php $this->endblock() ?>

<?php $this->block('javascript') ?>
<script type='text/javascript'>
    /* <![CDATA[ */
    function testSyncRequests() {
        <?php echo rq('HelloWorld')->ssleep(5) ?>;
        <?php echo rq('HelloWorld')->sleep(6) ?>;
        <?php echo rq('HelloWorld')->sleep(1) ?>;
        <?php echo rq('HelloWorld')->sleep(2) ?>;

        <?php echo rq('HelloWorld')->ssleep(5) ?>;
        <?php echo rq('HelloWorld')->sleep(6) ?>;
        <?php echo rq('HelloWorld')->sleep(1) ?>;
        <?php echo rq('HelloWorld')->sleep(2) ?>;
    }

    function testNodupRequests() {
        <?php echo rq('HelloWorld')->nodup(5) ?>;
        <?php echo rq('HelloWorld')->nodup(1) ?>;
        setTimeout(function() {
            <?php echo rq('HelloWorld')->nodup(1) ?>;
        }, 3000);
        setTimeout(function() {
            <?php echo rq('HelloWorld')->nodup(1) ?>;
        }, 6000);
        <?php echo rq('HelloWorld')->nodup(1) ?>;
    }

    nodupCallbacks = {
        enableCall: true,
        onPrepare: function(oRequest) {
            if(nodupCallbacks.enableCall == false) {
                oRequest.ignore = true;
                console.log('Ignored request to HelloWorld.nodup');
                return;
            }
            nodupCallbacks.enableCall = false;
            console.log('Allowed request to HelloWorld.nodup');
            console.log('Disabled request to HelloWorld.nodup');
        },
        onComplete: function() {
            nodupCallbacks.enableCall = true;
            console.log('Enabled request to HelloWorld.nodup');
        }
    }
    /* ]]> */
</script>
<?php $this->endblock() ?>
