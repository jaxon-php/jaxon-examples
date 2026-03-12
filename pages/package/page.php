<div class="row">
    <div class="col-md-12" id="hello-text-one">
        &nbsp;
    </div>
    <div class="col-md-4 select">
        <select class="form-select form-control" id="hello-color-one" name="hello-color-one" <?= attr()
            ->on('change', rq('App.Test.Test')->setColor(Jaxon\select('hello-color-one'))
                ->confirm('Set color to {1} not {2}?', jq('#hello-color-one')->val(), jq('#hello-color-two')->val())) ?>>
            <option value="black" selected="selected">Black</option>
            <option value="red">Red</option>
            <option value="green">Green</option>
            <option value="blue">Blue</option>
        </select>
    </div>
    <div class="col-md-8 buttons">
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq('App.Test.Test')->sayHello(1)) ?>>CLICK ME</button>
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq('App.Test.Test')->sayHello(0)) ?>>Click Me</button>
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq('App.Test.Test')->showDialog()) ?>>Show Dialog</button>
    </div>

    <div class="col-md-12" id="hello-text-two">
        &nbsp;
    </div>
    <div class="col-md-4 select">
        <select class="form-select form-control" id="hello-color-two" name="hello-color-two" <?= attr()
            ->on('change', rq('Ext.Test.Test')->setColor(Jaxon\select('hello-color-two'))
                ->confirm('Set color to {2} not {1}?', jq('#hello-color-one')->val(), jq('#hello-color-two')->val())) ?>>
            <option value="black" selected="selected">Black</option>
            <option value="red">Red</option>
            <option value="green">Green</option>
            <option value="blue">Blue</option>
        </select>
    </div>
    <div class="col-md-8 buttons">
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq('Ext.Test.Test')->sayHello(1)) ?>>CLICK ME</button>
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq('Ext.Test.Test')->sayHello(0)) ?>>Click Me</button>
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq('Ext.Test.Test')->showDialog()) ?>>Show Dialog</button>
    </div>
</div>
