<?php $this->extends('examples::layout.php') ?>

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
                        <select class="form-select" id="colorselect1" name="colorselect1"
                            onchange="<?php echo rq('App')->setColor(pm()->select('colorselect1'))->raw() ?>">
                            <option value="black" selected="selected">Black</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                        </select>
                    </div>
                    <div class="col-md-12 buttons">
                        <button type="button" class="btn btn-primary" onclick="<?php echo rq('App')->sayHello(1)->raw() ?>" >CLICK ME</button>
                        <button type="button" class="btn btn-primary" onclick="<?php echo rq('App')->sayHello(0)->raw() ?>" >Click Me</button>
                        <button type="button" class="btn btn-primary" onclick="<?php echo rq('App')->showDialog()->raw() ?>" >Show Dialog</button>
                    </div>

                    <div class="col-md-12" id="div2">
                        &nbsp;
                    </div>
                    <div class="col-md-12">
                        <select class="form-select" id="colorselect2" name="colorselect2"
                            onchange="<?php echo rq('Ext')->setColor(pm()->select('colorselect2'))->raw() ?>">
                            <option value="black" selected="selected">Black</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                        </select>
                    </div>
                    <div class="col-md-12 buttons">
                        <button type="button" class="btn btn-primary" onclick="<?php echo rq('Ext')->sayHello(1)->raw() ?>" >CLICK ME</button>
                        <button type="button" class="btn btn-primary" onclick="<?php echo rq('Ext')->sayHello(0)->raw() ?>" >Click Me</button>
                        <button type="button" class="btn btn-primary" onclick="<?php echo rq('Ext')->showDialog()->raw() ?>" >Show Dialog</button>
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
        <?php echo rq('App')->sayHello(0, false) ?>;
        <?php echo rq('App')->setColor(pm()->select('colorselect1'), false) ?>;
        <?php echo rq('Ext')->sayHello(0, false) ?>;
        <?php echo rq('Ext')->setColor(pm()->select('colorselect2'), false) ?>;
    }
    /* ]]> */
</script>
<?php $this->endblock() ?>
