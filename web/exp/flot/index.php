<?php

require(__DIR__ . '/defs.php');
require(__DIR__ . '/../../../includes/header.php');
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
                        <div class="col-md-12">
                            <div id="flot">
                                &nbsp;
                            </div>
                        </div>
                        <div class="col-md-8 margin-vert-10">
                            <button type="button" class="btn btn-primary" onclick="<?php echo rq(Flot::class)->drawGraph()->raw() ?>" >CLICK ME</button>
                        </div>

                </div>
            </div> <!-- class="content" -->
       </div> <!-- class="row" -->
    </div>
<div id="jaxon-init">
<script type='text/javascript'>
    /* <![CDATA[ */
    var plots = {
        xaxis: {
            label: x => `x${x}`,
        },
        sqrt: {
            value: x => Math.sqrt(x * 50),
            label: (series, x, y) => `${series}(${x} * 50) = ${y}`,
        },
    };
    window.onload = function() {
        // Call the Flot class to populate the 2nd div
        // <?php echo rq(Flot::class)->drawGraph() ?>;
    }
    /* ]]> */
</script>
</div>

<?php require(__DIR__ . '/../../../includes/footer.php') ?>
