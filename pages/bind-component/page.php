<div class="row">
    <div class="col-md-12" id="div2">
        &nbsp;
    </div>
    <div class="col-md-12">
        <select class="form-select" id="colorselect" name="colorselect" <?= attr()
            ->on('change', rq('HelloWorld')->setColor(Jaxon\select('colorselect'))) ?>>
            <option value="black" selected="selected">Black</option>
            <option value="red">Red</option>
            <option value="green">Green</option>
            <option value="blue">Blue</option>
        </select>
    </div>
    <div class="col-md-12 buttons">
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq('HelloWorld')->sayHello(1)) ?> >CLICK ME</button>
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq('HelloWorld')->sayHello(0)) ?> >Click Me</button>
    </div>
</div>
