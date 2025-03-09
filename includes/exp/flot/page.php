<?php $this->extends('examples::layout.php') ?>

<?php
use function Jaxon\rq;
?>

<?php $this->block('content') ?>
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
<?php $this->endblock() ?>
