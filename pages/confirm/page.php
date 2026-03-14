<div class="row">
    <div class="col-md-12" id="hello-text">
        &nbsp;
    </div>
    <div class="col-md-4 select">
        <select class="form-select form-control" id="colorselect" name="colorselect" <?= attr()
            ->on('change', rq('HelloWorld')->setColor(Jaxon\select('colorselect'))
                ->confirm('Set color to {1}?', Jaxon\select('colorselect'))) ?>>
            <option value="black" selected="selected">Black</option>
            <option value="red">Red</option>
            <option value="green">Green</option>
            <option value="blue">Blue</option>
        </select>
    </div>
    <div class="col-md-8 buttons">
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq('HelloWorld')->sayHello(1)
                ->confirm('Convert to uppercase?')) ?>>CLICK ME</button>
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq('HelloWorld')->sayHello(0)
                ->confirm('Convert to lowercase?')) ?>>Click Me</button>
    </div>
</div>
