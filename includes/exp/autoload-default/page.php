<?php $this->extend('examples::layout.php') ?>

<?php $this->block('content') ?>
                <div class="row">
                    <div class="col-md-12" id="div1">
                        &nbsp;
                    </div>
                    <div class="col-md-12">
                        <select class="form-control" id="colorselect1" name="colorselect1"
                                onchange="App.Test.Test.setColor(jaxon.$('colorselect1').value); return false;">
                            <option value="black" selected="selected">Black</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                        </select>
                    </div>
                    <div class="col-md-12 buttons">
                        <button type="button" class="btn btn-primary" onclick='App.Test.Test.sayHello(1); return false;' >CLICK ME</button>
                        <button type="button" class="btn btn-primary" onclick='App.Test.Test.sayHello(0); return false;' >Click Me</button>
                        <button type="button" class="btn btn-primary" onclick="App.Test.Test.showDialog(); return false;" >Tingle Dialog</button>
                    </div>

                    <div class="col-md-12" id="div2">
                        &nbsp;
                    </div>
                    <div class="col-md-12">
                        <select class="form-control" id="colorselect2" name="colorselect2"
                                onchange="Ext.Test.Test.setColor(jaxon.$('colorselect2').value); return false;">
                            <option value="black" selected="selected">Black</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                        </select>
                    </div>
                    <div class="col-md-12 buttons">
                        <button type="button" class="btn btn-primary" onclick="Ext.Test.Test.sayHello(1); return false;" >CLICK ME</button>
                        <button type="button" class="btn btn-primary" onclick="Ext.Test.Test.sayHello(0); return false;" >Click Me</button>
                        <button type="button" class="btn btn-primary" onclick="Ext.Test.Test.showDialog(); return false;" >Bootstrap Dialog</button>
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
        App.Test.Test.sayHello(0, false);
        // call the setColor function on load
        App.Test.Test.setColor(jaxon.$('colorselect1').value, false);
        // Call the HelloWorld class to populate the 2nd div
        Ext.Test.Test.sayHello(0, false);
        // call the HelloWorld->setColor() method on load
        Ext.Test.Test.setColor(jaxon.$('colorselect2').value, false);
    }
    /* ]]> */
</script>
<?php $this->endblock() ?>
