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
                    <div class="col-md-12">
                        <div id="flot">
                            &nbsp;
                        </div>
                    </div>
                    <div class="col-md-12 buttons">
                        <button type="button" class="btn btn-primary" onclick="<?php echo rq(Flot::class)->drawGraph()->raw() ?>" >CLICK ME</button>
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

<?php require dirname(__DIR__, 3) . '/includes/footer.php' ?>
