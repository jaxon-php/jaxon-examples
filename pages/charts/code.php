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

    public function drawGraph(string $library)
    {
        // Create a new plot, to be displayed in the div with id "chart-graph"
        $chart = $this->plugin()
            ->chart('chart-graph')
            ->width('650px')
            ->height('350px');

        // Set the ticks on X axis
        $chart->xaxis()->ticks()
            ->values($chart->loop(0, 16, 1))
            ->labels('chart.flot.xaxis.label');

        // Add a first graph to the plot
        $graph = $chart->graph('line')->label('Sqrt');
        $graph->series()
            ->func('chart.flot.sqrt.value', $chart->loop(0, 14, 0.5))
            ->labels('chart.flot.sqrt.label');

        // Add a second graph to the plot
        $graph = $chart->graph('line')
            ->options(['points' => ['show' => true]])
            ->label('Graph 2');
        $graph->series()->points([
            [0, 3, 'Pt 1'],
            [4, 8, 'Pt 2'],
            [8, 5, 'Pt 3'],
            [9, 13, 'Pt 4'],
        ]);

        // Draw the chart
        $this->plugin()->draw($chart, $library);
    }

    public function clearGraph()
    {
        $this->response()->clear('chart-graph');
    }

    public function drawGraphTypes(string $library)
    {
        // Create a new plot, to be displayed in the div with id "flot"
        $chart = $this->plugin()
            ->chart('chart-graph-types')
            ->width('650px')
            ->height('350px');

        // Add the d1 graph.
        $d1 = $chart->graph('line', true);
        $loop = $chart->loop(0, 14, 0.5);
        $d1->series()->func('Math.sin', $loop);

        // Add the d2 graph.
        $d2 = $chart->graph('bar', true);
        $d2->series()->points([[0, 3], [4, 8], [8, 5], [9, 13]]);

        // Add the d3 graph.
        $d3 = $chart->graph('point', true);
        $d3->series()->func('Math.cos', $loop);

        // Add the d4 graph.
        $d4 = $chart->graph('line');
        $d4->series()->func('chart.flot.types.d4.value', $loop);

        // Add the d5 graph.
        $d5 = $chart->graph('line')
            ->options(['points' => ['show' => true]]);
        $d5->series()->func('Math.sqrt', $loop);

        // Add the d6 graph.
        $d6 = $chart->graph('line')
            ->options(['lines' => ['steps' => true]]);
        $loop = $chart->loop(0, 14, 'chart.flot.types.d6.step');
        $d6->series()->func('chart.flot.types.d6.value', $loop);

        // Draw the chart
        $this->plugin()->draw($chart, $library);
    }

    public function clearGraphTypes()
    {
        $this->response()->clear('chart-graph-types');
    }

    public function drawGraphAxes(string $library)
    {
        // Create a new plot, to be displayed in the div with id "flot"
        $chart = $this->plugin()->chart('chart-graph-axes')->width('650px')->height('350px');

        // Create multiple X axes.
        $chart->xaxis(['position' => 'bottom']);
        $chart->xaxis(['position' => 'bottom']);
        $chart->xaxis(['position' => 'top']);
        // Create multiple Y axes.
        $chart->yaxis(['position' => 'left']);
        $chart->yaxis(['position' => 'left']);
        $chart->yaxis(['position' => 'right']);
        $chart->yaxis(['position' => 'left']);
        $chart->yaxis(['position' => 'right']);

        // Note: the added .01 in the loop end values are to have <= instead of <.

        // Add the d1 graph.
        $d1 = $chart->graph('line', true)
            ->options(['xaxis' => 1, 'yaxis' => 1]);
        $loop = $chart->loop(0, 10.01, 1/4);
        $d1->series()->func('Math.sqrt', $loop);

        // Add the d2 graph.
        $d2 = $chart->graph('point')
            ->options(['xaxis' => 1, 'yaxis' => 2]);
        $d2->series()->func('Math.sin', $loop);

        // Add the d3 graph.
        $d3 = $chart->graph('bar')->options([
            'xaxis' => 1, 'yaxis' => 3,
        ]);
        $d3->series()->func('chart.flot.axes.d3.value', $loop);

        // Add the d4 graph.
        $d4 = $chart->graph('line')
            ->options(['xaxis' => 2, 'yaxis' => 4, 'lines' => ['steps' => true]]);
        $d4->series()->func('Math.tan', $chart->loop(2, 10.01, 1/5));

        // Add the d5 graph.
        $d5 = $chart->graph('bar', true)->options([
            'xaxis' => 3,
            'yaxis' => 5,
            'bars' => [
                'barWidth' => 0.1,
                'align' => 'center',
            ],
        ]);
        $d5->series()->func('chart.flot.axes.d5.value', $chart->loop(5, 15.01, 1/4));

        // Draw the chart
        $this->plugin()->draw($chart, $library);
    }

    public function clearGraphAxes()
    {
        $this->response()->clear('chart-graph-axes');
    }

    public function drawPieChart(string $library)
    {
        // Create a new plot, to be displayed in the div with id "flot"
        $chart = $this->plugin()
            ->chart('chart-graph-pie')
            ->width('650px')
            ->height('350px');
        // The options depend on the chosen library.
        $options = [
            'flot' => [
                'series' => [
                    'pie' => [
                        'show' => true,
                        'radius' => 1,
                        'innerRadius' => 0.5,
                        'label' => [
                            'show' => true,
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
            ],
            'chartjs' => [
                'responsive' => true,
                'plugins' => [
                    'legend' => [
                        'position' => 'top',
                    ],
                    // 'title' => [
                    //     'display' => true,
                    //     'text' => 'Chart.js Pie Chart'
                    // ]
                ]
            ]
        ];

        // Set the plot options
        $chart->options($options[$library] ?? []);
        // Add the pie to the plot
        $chart->pie()
            ->labels(['Pt 1', 'Pt 2', 'Pt 3', 'Pt 4'])
            ->series()->slices([[3], [8], [5], [13]]);

        // Draw the chart
        $this->plugin()->draw($chart, $library);
    }

    public function clearPieChart()
    {
        $this->response()->clear('chart-graph-pie');
    }
}

// Register object
$jaxon = jaxon();
$jaxon->setOption('js.lib.uri', '/js');
$jaxon->setAppOptions([
    'charts.lib.use' => ['flot', 'chartjs'],
    'charts.assets.flot' => false,
]);
$jaxon->register(Jaxon::CALLABLE_CLASS, Chart::class);

// The Javascript pie plugin for Flot needs to be loaded.
$jaxon->di()->g(FlotPlugin::class)->usePie(true);
