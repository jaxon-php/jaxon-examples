<?php
use function Jaxon\pm;
?>

<div class="row">
    <div class="col-md-4 select">
        <select class="form-select form-control" id="chart-graph-library">
            <option value="flot" selected="selected">Flot</option>
            <option value="chartjs">Chart.js</option>
        </select>
    </div>
    <div class="col-md-8 buttons">
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq(Chart::class)->drawGraph(pm()->select('chart-graph-library'))) ?>>Draw graph</button>
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq(Chart::class)->clearGraph()) ?>>Clear</button>
    </div>
    <div class="col-md-12">
        <div id="chart-graph"></div>
    </div>
</div>
<div class="row">
    <div class="col-md-4 select">
        <select class="form-select form-control" id="chart-graph-types-library">
            <option value="flot" selected="selected">Flot</option>
            <option value="chartjs">Chart.js</option>
        </select>
    </div>
    <div class="col-md-8 buttons">
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq(Chart::class)->drawGraphTypes(pm()->select('chart-graph-types-library'))) ?>>Draw multiple graph types</button>
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq(Chart::class)->clearGraphTypes()) ?>>Clear</button>
    </div>
    <div class="col-md-12">
        <div id="chart-graph-types"></div>
    </div>
</div>
<div class="row">
    <div class="col-md-4 select">
        <select class="form-select form-control" id="chart-graph-axes-library">
            <option value="flot" selected="selected">Flot</option>
            <option value="chartjs">Chart.js</option>
        </select>
    </div>
    <div class="col-md-8 buttons">
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq(Chart::class)->drawGraphAxes(pm()->select('chart-graph-axes-library'))) ?>>Draw graphs with multiple axes</button>
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq(Chart::class)->clearGraphAxes()) ?>>Clear</button>
    </div>
    <div class="col-md-12">
        <div id="chart-graph-axes"></div>
    </div>
</div>
<div class="row">
    <div class="col-md-4 select">
        <select class="form-select form-control" id="chart-graph-pie-library">
            <option value="flot" selected="selected">Flot</option>
            <option value="chartjs">Chart.js</option>
        </select>
    </div>
    <div class="col-md-8 buttons">
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq(Chart::class)->drawPieChart(pm()->select('chart-graph-pie-library'))) ?>>Draw pie chart</button>
        <button type="button" class="btn btn-primary" <?= attr()
            ->click(rq(Chart::class)->clearPieChart()) ?>>Clear</button>
    </div>
    <div class="col-md-12">
        <div id="chart-graph-pie"></div>
    </div>
</div>
