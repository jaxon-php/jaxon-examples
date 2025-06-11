<?php $this->extends('templates::examples/layout.php') ?>

<?php $this->block('content') ?>
                <div class="row">
                    <div class="col-md-12" id="div1">
                        &nbsp;
                    </div>
                    <div class="col-md-12">
                        <select class="form-select" id="colorselect1" name="colorselect1"
                            <?= attr()->on('change', rq('App')->setColor(je('colorselect1')->rd()->select())) ?>>
                            <option value="black" selected="selected">Black</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                        </select>
                    </div>
                    <div class="col-md-12 buttons">
                        <button type="button" class="btn btn-primary" <?= attr()->click(rq('App')->sayHello(1)) ?>>CLICK ME</button>
                        <button type="button" class="btn btn-primary" <?= attr()->click(rq('App')->sayHello(0)) ?>>Click Me</button>
                        <button type="button" class="btn btn-primary" <?= attr()->click(rq('App')->showDialog()) ?>>Show Dialog</button>
                    </div>

                    <div class="col-md-12" id="div2">
                        &nbsp;
                    </div>
                    <div class="col-md-12">
                        <select class="form-select" id="colorselect2" name="colorselect2"
                            <?= attr()->on('change', rq('Ext')
                                ->setColor(je('colorselect2')->rd()->select())) ?>>
                            <option value="black" selected="selected">Black</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                        </select>
                    </div>
                    <div class="col-md-12 buttons">
                        <button type="button" class="btn btn-primary" <?= attr()->click(rq('Ext')->sayHello(1)) ?>>CLICK ME</button>
                        <button type="button" class="btn btn-primary" <?= attr()->click(rq('Ext')->sayHello(0)) ?>>Click Me</button>
                        <button type="button" class="btn btn-primary" <?= attr()->click(rq('Ext')->showDialog()) ?>>Show Dialog</button>
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
        <?= rq('App')->sayHello(0, false) ?>;
        <?= rq('App')->setColor(je('colorselect1')->rd()->select(), false) ?>;
        <?= rq('Ext')->sayHello(0, false) ?>;
        <?= rq('Ext')->setColor(je('colorselect2')->rd()->select(), false) ?>;
    }
    /* ]]> */
</script>
<?php $this->endblock() ?>
