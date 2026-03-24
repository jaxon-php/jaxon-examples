<?php

use Jaxon\Jaxon;
use Jaxon\Charts\ChartPlugin;
use Jaxon\Flot\FlotPlugin;

class Chart extends \Jaxon\App\FuncComponent
{
    private function plugin(): ChartPlugin
    {
        return $this->response()->plugin(ChartPlugin::class);
    }

    public function drawGraph()
    {
        // Create a new plot, to be displayed in the div with id "flot"
        $card = $this->plugin()->card('flot-graph')->width('650px')->height('350px');

        // Set the ticks on X axis
        $card->xaxis()->ticks()->loop(0, 16, 1, 'chart.flot.xaxis.label');

        // Add a first graph to the plot
        $graph = $card->graph([
            'lines' => ['show' => true],
            'label' => 'Sqrt',
        ]);
        $graph->series()->loop(0, 14, 0.5, 'chart.flot.sqrt.value', 'chart.flot.sqrt.label');

        // Add a second graph to the plot
        $graph = $card->graph([
            'lines' => ['show' => true],
            'points' => ['show' => true],
            'label' => 'Graph 2',
        ]);
        $graph->series()->points([
            [0, 3, 'Pt 1'],
            [4, 8, 'Pt 2'],
            [8, 5, 'Pt 3'],
            [9, 13, 'Pt 4'],
        ]);

        // Draw the graph
        $this->plugin()->draw($card, 'flot');
    }

    public function clearGraph()
    {
        $this->response()->clear('flot-graph');
    }

    public function drawGraphTypes()
    {
        // Create a new plot, to be displayed in the div with id "flot"
        $card = $this->plugin()->card('flot-graph-types')->width('650px')->height('350px');

        // Add the d1 graph.
        $d1 = $card->graph([
            'lines' => ['show' => true, 'fill' => true],
        ]);
        $d1->series()->loop(0, 14, 0.5, 'Math.sin');

        // Add the d2 graph.
        $d2 = $card->graph([
            'bars' => ['show' => true],
        ]);
        $d2->series()->points([[0, 3], [4, 8], [8, 5], [9, 13]]);

        // Add the d3 graph.
        $d3 = $card->graph([
            'points' => ['show' => true],
        ]);
        $d3->series()->loop(0, 14, 0.5, 'Math.cos');

        // Add the d4 graph.
        $d4 = $card->graph([
            'lines' => ['show' => true],
        ]);
        $d4->series()->loop(0, 14, 0.5, 'chart.flot.types.d4.value');

        // Add the d5 graph.
        $d5 = $card->graph([
            'lines' => ['show' => true],
            'points' => ['show' => true],
        ]);
        $d5->series()->loop(0, 14, 0.5, 'Math.sqrt');

        // Add the d6 graph.
        $d6 = $card->graph([
            'lines' => ['show' => true, 'steps' => true],
        ]);
        $d6->series()->loop(0, 14, 'chart.flot.types.d6.step', 'chart.flot.types.d6.value');

        // Draw the graph
        $this->plugin()->draw($card, 'flot');
    }

    public function clearGraphTypes()
    {
        $this->response()->clear('flot-graph-types');
    }

    public function drawGraphAxes()
    {
        // Create a new plot, to be displayed in the div with id "flot"
        $card = $this->plugin()->card('flot-graph-axes')->width('650px')->height('350px');

        // Create multiple X axes.
        $card->xaxis(['position' => 'bottom']);
        $card->xaxis(['position' => 'bottom']);
        $card->xaxis(['position' => 'top']);
        // Create multiple Y axes.
        $card->yaxis(['position' => 'left']);
        $card->yaxis(['position' => 'left']);
        $card->yaxis(['position' => 'right']);
        $card->yaxis(['position' => 'left']);
        $card->yaxis(['position' => 'right']);

        // Note: the added .01 in the loop end values are to have <= instead of <.

        // Add the d1 graph.
        $d1 = $card->graph([
            'xaxis' => 1, 'yaxis' => 1, 'lines' => ['show' => true, 'fill' => true],
        ]);
        $d1->series()->loop(0, 10.01, 1/4, 'Math.sqrt');

        // Add the d1 graph.
        $d2 = $card->graph([
            'xaxis' => 1, 'yaxis' => 2, 'points' => ['show' => true],
        ]);
        $d2->series()->loop(0, 10.01, 1/4, 'Math.sin');

        // Add the d1 graph.
        $d3 = $card->graph([
            'xaxis' => 1, 'yaxis' => 3,
        ]);
        $d3->series()->loop(0, 10.01, 1/4, 'chart.flot.axes.d3.value');

        // Add the d1 graph.
        $d4 = $card->graph([
            'xaxis' => 2, 'yaxis' => 4, 'lines' => ['show' => true, 'steps' => true],
        ]);
        $d4->series()->loop(2, 10.01, 1/5, 'Math.tan');

        // Add the d1 graph.
        $d5 = $card->graph([
            'xaxis' => 3, 'yaxis' => 5, 'bars' => ['show' => true, 'fill' => true, 'barWidth' => 0.1, 'align' => 'center'],
        ]);
        $d5->series()->loop(5, 15.01, 1/4, 'chart.flot.axes.d5.value');

        // Draw the graph
        $this->plugin()->draw($card, 'flot');
    }

    public function clearGraphAxes()
    {
        $this->response()->clear('flot-graph-axes');
    }

    public function drawPieChart()
    {
        // Create a new plot, to be displayed in the div with id "flot"
        $card = $this->plugin()->card('flot-pie-chart')->width('650px')->height('350px');

        // Set the plot options
        $card->options([
            'series' => [
                'pie' => [
                    'show' => true,
                    'radius' => 1,
                    'innerRadius' => 0.5,
                    'label' => [
                        'show' => true,
                        'radius' => 1,
                        'formatter' => 'chart.flot.pie.label',
                        'background' => [
                            'opacity' => 0.8
                        ],
                    ],
                ],
            ],
            'legend' => [
                'show' => false
            ],
        ]);

        // Add the pie to the plot
        $card->pie()->series()->slices([
            [3, 'Pt 1'],
            [8, 'Pt 2'],
            [5, 'Pt 3'],
            [13, 'Pt 4'],
        ]);

        // Draw the graph
        $this->plugin()->draw($card, 'flot');
    }

    public function clearPieChart()
    {
        $this->response()->clear('flot-pie-chart');
    }
}

// Register object
$jaxon = jaxon();
$jaxon->setOption('js.lib.uri', '/js');
$jaxon->setAppOptions([
    'charts.lib.use' => ['flot'],
    'charts.assets.flot' => false,
]);
$jaxon->register(Jaxon::CALLABLE_CLASS, Chart::class);

// The Javascript pie plugin for Flot needs to be loaded.
$jaxon->di()->g(FlotPlugin::class)->usePie(true);
