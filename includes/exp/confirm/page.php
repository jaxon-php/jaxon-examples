<?php $this->extends('examples::layout.php') ?>

<?php
use function Jaxon\pm;
use function Jaxon\rq;
use function Jaxon\jq;
?>

<?php $this->block('content') ?>
                <div class="row">
                    <div class="col-md-12" id="div2">
                        &nbsp;
                    </div>
                    <div class="col-md-12">
                        <select class="form-control" id="colorselect" name="colorselect">
                            <option value="black" selected="selected">Black</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                        </select>
                    </div>
                    <div class="col-md-12 buttons">
                        <button type="button" class="btn btn-primary" id="btn-uppercase">CLICK ME</button>
                        <button type="button" class="btn btn-primary" id="btn-lowercase">Click Me</button>
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
        // Set event handlers
        <?php echo jq('#colorselect')
            ->on('change', rq('HelloWorld')
            ->setColor(pm()->select('colorselect'))
            ->confirm('Set color to {1}', pm()->select('colorselect'))) ?>;
        <?php echo jq('#btn-uppercase')
            ->on('click', rq('HelloWorld')
            ->sayHello(1)
            ->confirm('Convert to uppercase?')) ?>;
        <?php echo jq('#btn-lowercase')
            ->on('click', rq('HelloWorld')
            ->sayHello(0)
            ->confirm('Convert to lowercase?')) ?>;
        // Call the HelloWorld class to populate the 2nd div
        <?php echo rq('HelloWorld')->sayHello(0) ?>;
    }
    /* ]]> */
</script>
<?php $this->endblock() ?>
