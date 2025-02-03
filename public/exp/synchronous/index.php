<?php

require __DIR__ . '/defs.php';
require dirname(__DIR__, 3) . '/includes/header.php';
use function Jaxon\rq;
?>

    <div class="container-fluid">
<?php require dirname(__DIR__, 3) . '/includes/nav.php' ?>

        <div class="row">
            <div class="col-md-4 exp-form">
<?php require dirname(__DIR__, 3) . '/includes/title.php' ?>

                <div class="row">
                    <div class="col-md-12" id="div2">
                        &nbsp;
                    </div>
                    <div class="col-md-12 buttons">
                        <button type="button" class="btn btn-primary" onclick="testSyncRequests()" >Test sync</button>
                        <button type="button" class="btn btn-primary" onclick="testNodupRequests()" >Test nodup</button>
                    </div>
                </div>
            </div> <!-- class="exp-form" -->

            <div class="col-md-8 exp-code">
<?php require dirname(__DIR__, 3) . '/includes/code.php' ?>
            </div>
       </div> <!-- class="row" -->
    </div>

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

<?php require dirname(__DIR__, 3) . '/includes/footer.php' ?>
