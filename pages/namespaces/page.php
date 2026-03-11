<div class="row">
    <div class="col-md-12" id="div1">
        &nbsp;
    </div>
    <div class="col-md-12">
        <select class="form-select" id="colorselect1" name="colorselect1" <?= attr()
            ->on('change', rq('App.Test.Test')->setColor(Jaxon\select('colorselect1'))
                ->confirm('Set color to {1} not {2}?', jq('#colorselect1')->val(), jq('#colorselect2')->val())) ?>>
            <option value="black" selected="selected">Black</option>
            <option value="red">Red</option>
            <option value="green">Green</option>
            <option value="blue">Blue</option>
        </select>
    </div>
    <div class="col-md-12 buttons">
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq('App.Test.Test')->sayHello(1)) ?>>CLICK ME</button>
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq('App.Test.Test')->sayHello(0)) ?>>Click Me</button>
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq('App.Test.Test')->showDialog()) ?>>Show Dialog</button>
    </div>

    <div class="col-md-12" id="div2">
        &nbsp;
    </div>
    <div class="col-md-12">
        <select class="form-select" id="colorselect2" name="colorselect2" <?= attr()
            ->on('change', rq('Ext.Test.Test')->setColor(Jaxon\select('colorselect2'))
                ->confirm('Set color to {2} not {1}?', jq('#colorselect1')->val(), jq('#colorselect2')->val())) ?>>
            <option value="black" selected="selected">Black</option>
            <option value="red">Red</option>
            <option value="green">Green</option>
            <option value="blue">Blue</option>
        </select>
    </div>
    <div class="col-md-12 buttons">
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq('Ext.Test.Test')->sayHello(1)) ?>>CLICK ME</button>
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq('Ext.Test.Test')->sayHello(0)) ?>>Click Me</button>
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq('Ext.Test.Test')->showDialog()) ?>>Show Dialog</button>
    </div>
</div>
