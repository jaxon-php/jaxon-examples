<div class="row">
    <div class="col-md-8 buttons">
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq(Chart::class)->drawGraph()) ?>>Draw graph</button>
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq(Chart::class)->clearGraph()) ?>>Clear</button>
    </div>
    <div class="col-md-12">
        <div id="flot-graph"></div>
    </div>
</div>
<div class="row">
    <div class="col-md-8 buttons">
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq(Chart::class)->drawGraphTypes()) ?>>Draw multiple graph types</button>
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq(Chart::class)->clearGraphTypes()) ?>>Clear</button>
    </div>
    <div class="col-md-12">
        <div id="flot-graph-types"></div>
    </div>
</div>
<div class="row">
    <div class="col-md-8 buttons">
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq(Chart::class)->drawGraphAxes()) ?>>Draw graphs with multiple axes</button>
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq(Chart::class)->clearGraphAxes()) ?>>Clear</button>
    </div>
    <div class="col-md-12">
        <div id="flot-graph-axes"></div>
    </div>
</div>
<div class="row">
    <div class="col-md-8 buttons">
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq(Chart::class)->drawPieChart()) ?>>Draw pie chart</button>
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq(Chart::class)->clearPieChart()) ?>>Clear</button>
    </div>
    <div class="col-md-12">
        <div id="flot-pie-chart"></div>
    </div>
</div>
