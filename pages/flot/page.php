<div class="row">
    <div class="col-md-12">
        <div id="flot-graph">
            &nbsp;
        </div>
    </div>
    <div class="col-md-8 buttons">
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq(Flot::class)->drawGraph()) ?>>Draw graph</button>
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq(Flot::class)->clearGraph()) ?>>Clear graph</button>
    </div>
</div>
