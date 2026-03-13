<div class="row">
    <div class="col-md-12" <?= attr()->bind(rq(App\Test\Test::class)) ?>>
        Initial content : <?= attr()->html(rq(App\Test\Test::class)) ?>
    </div>
    <div class="col-md-4 select">
        <!-- Custom attribute: Event handler on DOM node. -->
        <select class="form-select form-control" <?php
                echo attr()->on('change', rq(App\Test\Test::class)->setColor(jq()->val())) ?>>
            <option value="black" selected="selected">Black</option>
            <option value="red">Red</option>
            <option value="green">Green</option>
            <option value="blue">Blue</option>
        </select>
    </div>
    <div class="col-md-8 buttons" <?= attr()->bind(rq(App\Test\Buttons::class)) ?>>
    </div>

    <div class="col-md-12" <?= attr()->bind(rq(Ext\Test\Test::class)) ?>>
        Initial content : <?= attr()->html(rq(Ext\Test\Test::class)) ?>
    </div>
    <div class="col-md-4 select">
        <!-- Custom attribute: Event handler on DOM node. -->
        <select class="form-select form-control" <?php
                echo attr()->on('change', rq(Ext\Test\Test::class)->setColor(jq()->val())) ?>>
            <option value="black" selected="selected">Black</option>
            <option value="red">Red</option>
            <option value="green">Green</option>
            <option value="blue">Blue</option>
        </select>
    </div>
    <div class="col-md-8 buttons" <?= attr()->bind(rq(Ext\Test\Buttons::class)) ?>>
    </div>
</div>
