<div class="row">
    <div class="col-md-12" id="div1">
        &nbsp;
    </div>
    <div class="col-md-12">
        <select class="form-select" id="colorselect1" name="colorselect1"
            <?= attr()->on('change', rq('App')->setColor(Jaxon\select('colorselect1'))) ?>>
            <option value="black" selected="selected">Black</option>
            <option value="red">Red</option>
            <option value="green">Green</option>
            <option value="blue">Blue</option>
        </select>
    </div>
    <div class="col-md-12 buttons">
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq('App')->sayHello(1)) ?>>CLICK ME</button>
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq('App')->sayHello(0)) ?>>Click Me</button>
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq('App')->showDialog()) ?>>Show Dialog</button>
    </div>

    <div class="col-md-12" id="div2">
        &nbsp;
    </div>
    <div class="col-md-12">
        <select class="form-select" id="colorselect2" name="colorselect2" <?= attr()
            ->on('change', rq('Ext')->setColor(Jaxon\select('colorselect2'))) ?>>
            <option value="black" selected="selected">Black</option>
            <option value="red">Red</option>
            <option value="green">Green</option>
            <option value="blue">Blue</option>
        </select>
    </div>
    <div class="col-md-12 buttons">
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq('Ext')->sayHello(1)) ?>>CLICK ME</button>
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq('Ext')->sayHello(0)) ?>>Click Me</button>
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq('Ext')->showDialog()) ?>>Show Dialog</button>
    </div>
</div>
