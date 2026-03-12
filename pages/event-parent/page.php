<div class="row">
    <div class="col-md-12" <?= attr()->bind(rq(App\Test\Test::class)) ?>>
        Initial content : <?= cl(App\Test\Test::class)->html() ?>
    </div>
    <!-- Custom attribute: Event handler on child nodes, using a selector. -->
    <div class="col-md-4" <?= attr()->select('.color-choice')
        ->on('change', rq(App\Test\Test::class)->setColor(jq()->val())) ?>>
        <select class="form-control color-choice">
            <option value="black" selected="selected">Black</option>
            <option value="red">Red</option>
            <option value="green">Green</option>
            <option value="blue">Blue</option>
        </select>
    </div>
    <div class="col-md-8 buttons" <?= attr()->bind(rq(App\Test\Buttons::class)) ?>>
    </div>

    <div class="col-md-12" <?= attr()->bind(rq(Ext\Test\Test::class)) ?>>
        Initial content : <?= cl(Ext\Test\Test::class)->html() ?>
    </div>
    <!-- Custom attribute: Event handler on child nodes, using a selector. -->
    <div class="col-md-4" <?= attr()->select('.color-choice')
            ->on('change', rq(Ext\Test\Test::class)->setColor(jq()->val())) ?>>
        <select class="form-control color-choice">
            <option value="black" selected="selected">Black</option>
            <option value="red">Red</option>
            <option value="green">Green</option>
            <option value="blue">Blue</option>
        </select>
    </div>
    <div class="col-md-8 buttons" <?= attr()->bind(rq(Ext\Test\Buttons::class)) ?>>
    </div>
</div>
