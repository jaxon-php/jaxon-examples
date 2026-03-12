<div class="row">
    <div class="col-md-12" id="hello-text-one">
        &nbsp;
    </div>
    <div class="col-md-4 select">
        <select class="form-select form-control" id="hello-color-one" name="hello-color-one"
            <?= attr()->on('change', rq('App')->setColor(Jaxon\select('hello-color-one'))) ?>>
            <option value="black" selected="selected">Black</option>
            <option value="red">Red</option>
            <option value="green">Green</option>
            <option value="blue">Blue</option>
        </select>
    </div>
    <div class="col-md-8 buttons">
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq('App')->sayHello(1)) ?>>CLICK ME</button>
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq('App')->sayHello(0)) ?>>Click Me</button>
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq('App')->showDialog()) ?>>Show Dialog</button>
    </div>

    <div class="col-md-12" id="hello-text-two">
        &nbsp;
    </div>
    <div class="col-md-4 select">
        <select class="form-select form-control" id="hello-color-two" name="hello-color-two" <?= attr()
            ->on('change', rq('Ext')->setColor(Jaxon\select('hello-color-two'))) ?>>
            <option value="black" selected="selected">Black</option>
            <option value="red">Red</option>
            <option value="green">Green</option>
            <option value="blue">Blue</option>
        </select>
    </div>
    <div class="col-md-8 buttons">
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq('Ext')->sayHello(1)) ?>>CLICK ME</button>
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq('Ext')->sayHello(0)) ?>>Click Me</button>
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq('Ext')->showDialog()) ?>>Show Dialog</button>
    </div>
</div>
