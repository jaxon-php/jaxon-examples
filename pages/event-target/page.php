<!-- Custom attribute: Multiple event handlers on child nodes. -->
<div class="row" <?= attr()
    ->select('.app-color-choice')->on('change',
        rq(App\Test\Test::class)->setColor(jq()->val()))
    ->select('.ext-color-choice')->on('change',
        rq(Ext\Test\Test::class)->setColor(jq()->val())) ?>>

    <div class="col-md-12" <?= attr()->bind(rq(App\Test\Test::class)) ?>>
        Initial content : <?= cl(App\Test\Test::class)->html() ?>
    </div>
    <div class="col-md-12">
        <select class="form-control app-color-choice">
            <option value="black" selected="selected">Black</option>
            <option value="red">Red</option>
            <option value="green">Green</option>
            <option value="blue">Blue</option>
        </select>
    </div>
    <div class="col-md-12 buttons" <?= attr()->bind(rq(App\Test\Buttons::class)) ?>>
    </div>

    <div class="col-md-12" <?= attr()->bind(rq(Ext\Test\Test::class)) ?>>
        Initial content : <?= attr()->html(rq(Ext\Test\Test::class)) ?>
    </div>
    <div class="col-md-12">
        <select class="form-control ext-color-choice">
            <option value="black" selected="selected">Black</option>
            <option value="red">Red</option>
            <option value="green">Green</option>
            <option value="blue">Blue</option>
        </select>
    </div>
    <div class="col-md-12 buttons" <?= attr()->bind(rq(Ext\Test\Buttons::class)) ?>>
    </div>
</div>
