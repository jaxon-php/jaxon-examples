<?php

require(__DIR__ . '/defs.php');
require(__DIR__ . '/../../includes/header.php')
?>

    <div class="container-fluid">
        <div class="row">
<?php require(__DIR__ . '/../../includes/nav.php') ?>
            <div class="col-sm-9 content">
                <h3 class="page-header">Graphs with the Flot library</h3>

                <div class="row" id="jaxon-html">
                        <div class="col-md-12">
                            <div id="flot">
                                &nbsp;
                            </div>
                        </div>
                        <div class="col-md-8 margin-vert-10">
                            <button type="button" class="btn btn-primary" onclick="<?php echo rq(Flot::class)->drawGraph() ?>" >CLICK ME</button>
                        </div>

                </div>
            </div> <!-- class="content" -->
       </div> <!-- class="row" -->
    </div>
<div id="jaxon-init">
<script type='text/javascript'>
    /* <![CDATA[ */
    window.onload = function() {
        // Call the Flot class to populate the 2nd div
        // <?php echo rq(Flot::class)->drawGraph() ?>;
    }
    /* ]]> */
</script>
</div>

<?php require(__DIR__ . '/../../includes/footer.php') ?>
