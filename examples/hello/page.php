<?php $this->extends('templates::examples/layout.php') ?>

<?php
use function Jaxon\pm;
use function Jaxon\rq;
?>

<?php $this->block('content') ?>
                <div class="row">
                    <div class="col-md-12" id="div1">
                        &nbsp;
                    </div>
                    <div class="col-md-12">
                        <select class="form-select" id="colorselect" name="colorselect"
                                onchange="<?php echo rq()->setColor(pm()->select('colorselect'))->raw() ?>">
                            <option value="black" selected="selected">Black</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                        </select>
                    </div>
                    <div class="col-md-12 buttons">
                        <button type="button" class="btn btn-primary" onclick="<?php echo rq()->helloWorld(1)->raw() ?>" >CLICK ME</button>
                        <button type="button" class="btn btn-primary" onclick="<?php echo rq()->helloWorld(0)->raw() ?>" >Click Me</button>
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
    window.onload = function() {
        // call the helloWorld function to populate the div on load
        <?php echo rq()->helloWorld(0) ?>;
        // call the setColor function on load
        <?php echo rq()->setColor(pm()->select('colorselect')) ?>;
    }
    /* ]]> */
</script>
<?php $this->endblock() ?>
