<?php

use Jaxon\Jaxon;
use Jaxon\Flot\FlotPlugin;

class Flot extends \Jaxon\App\FuncComponent
{
    public function drawGraph()
    {
        /** @var FlotPlugin */
        $flot = $this->response()->plugin(FlotPlugin::class);
        // Create a new plot, to be displayed in the div with id "flot"
        $plot = $flot->plot('flot-graph')->width('650px')->height('350px');

        // Set the ticks on X axis
        $plot->xaxis()->loop(0, 16, 1, 'plot.xaxis.label');

        // Add a first graph to the plot
        $graph = $plot->graph([
            'lines' => ['show' => true],
            'label' => 'Sqrt',
        ]);
        $graph->series()->loop(0, 14, 0.5, 'plot.sqrt.value', 'plot.sqrt.label');

        // Add a second graph to the plot
        $graph = $plot->graph([
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
        $flot->draw($plot);
    }

    public function clearGraph()
    {
        $this->response()->clear('flot-graph');
    }
}

// Register object
$jaxon = jaxon();
$jaxon->setOption('js.lib.uri', '/js');
$jaxon->register(Jaxon::CALLABLE_CLASS, Flot::class);
