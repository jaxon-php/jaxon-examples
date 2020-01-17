<?php

require(__DIR__ . '/defs.php');
require(__DIR__ . '/../../includes/header.php');
?>

    <div class="container-fluid">
        <div class="row">
<?php require(__DIR__ . '/../../includes/nav.php') ?>
            <div class="col-sm-9 content">
                <h3 class="page-header">Hello World Class</h3>

                <div class="row" id="jaxon-html">
                    <div class="col-md-3 margin-vert-10">
                        <button type="button" class="btn btn-primary" onclick="testSyncRequests()" >Test sync</button>
                        <button type="button" class="btn btn-primary" onclick="testNodupRequests()" >Test nodup</button>
                    </div>
                    <div class="col-md-9" id="div2">
                        &nbsp;
                    </div>
                </div>
            </div> <!-- class="content" -->
       </div> <!-- class="row" -->
    </div>
<div id="jaxon-init">
<script type='text/javascript'>
    /* <![CDATA[ */
    function testSyncRequests() {
        <?php echo rq('HelloWorld')->call('ssleep', 5) ?>;
        <?php echo rq('HelloWorld')->call('sleep', 6) ?>;
        <?php echo rq('HelloWorld')->call('sleep', 1) ?>;
        <?php echo rq('HelloWorld')->call('sleep', 2) ?>;

        <?php echo rq('HelloWorld')->call('ssleep', 5) ?>;
        <?php echo rq('HelloWorld')->call('sleep', 6) ?>;
        <?php echo rq('HelloWorld')->call('sleep', 1) ?>;
        <?php echo rq('HelloWorld')->call('sleep', 2) ?>;
    }

    function testNodupRequests() {
        <?php echo rq('HelloWorld')->call('nodup', 5) ?>;
        <?php echo rq('HelloWorld')->call('nodup', 1) ?>;
        setTimeout(function() {
            <?php echo rq('HelloWorld')->call('nodup', 1) ?>;
        }, 3000);
        setTimeout(function() {
            <?php echo rq('HelloWorld')->call('nodup', 1) ?>;
        }, 6000);
        <?php echo rq('HelloWorld')->call('nodup', 1) ?>;
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
</div>

<?php require(__DIR__ . '/../../includes/footer.php') ?>
