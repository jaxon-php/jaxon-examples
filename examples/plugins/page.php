<?php $this->extends('templates::examples/layout.php') ?>

<?php
use function Jaxon\pm;
use function Jaxon\rq;
?>

<?php $this->block('content') ?>
                <div class="row">
                    <div class="col-md-12" id="div2">
                        &nbsp;
                    </div>
                    <div class="col-md-12">
                        <select class="form-select" id="colorselect" name="colorselect"
                                onchange="<?php echo rq('HelloWorld')->setColor(pm()->select('colorselect'))->raw() ?>">
                            <option value="black" selected="selected">Black</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                        </select>
                    </div>
                    <div class="col-md-12 buttons">
                        <button type="button" class="btn btn-primary" onclick="<?php echo rq('HelloWorld')->sayHello(1)
                            ->confirm('Sure?')->raw() ?>" >CLICK ME</button>
                        <button type="button" class="btn btn-primary" onclick="<?php echo rq('HelloWorld')->sayHello(0)
                            ->confirm('Sure?')->raw() ?>" >Click Me</button>
                        <button type="button" class="btn btn-primary" onclick="<?php echo rq('HelloWorld')->showDialog()
                            ->confirm('Sure?')->raw() ?>" >Show Dialog</button>
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
        // Call the HelloWorld class to populate the 2nd div
        <?php echo rq('HelloWorld')->sayHello(0, false) ?>;
        // call the HelloWorld->setColor() method on load
        <?php echo rq('HelloWorld')->setColor(pm()->select('colorselect'), false) ?>;
    }
    /* ]]> */
</script>
<?php $this->endblock() ?>
