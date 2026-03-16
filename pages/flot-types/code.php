<?php

use Jaxon\Jaxon;
use Jaxon\Flot\FlotPlugin;

class Flot extends \Jaxon\App\FuncComponent
{
    public function drawGraph()
    {
        // Examples from https://www.flotcharts.org/flot/examples/series-types/index.html
        /** @var FlotPlugin */
        $flot = $this->response()->plugin(FlotPlugin::class);
        // Create a new plot, to be displayed in the div with id "flot"
        $plot = $flot->plot('flot-graph')->width('450px')->height('300px');

        // Add the d1 graph.
        $d1 = $plot->graph([
            'lines' => ['show' => true, 'fill' => true],
        ]);
        $d1->series()->loop(0, 14, 0.5, 'Math.sin');

        // Add the d2 graph.
        $d2 = $plot->graph([
            'bars' => ['show' => true],
        ]);
        $d2->series()->points([[0, 3], [4, 8], [8, 5], [9, 13]]);

        // Add the d3 graph.
        $d3 = $plot->graph([
            'points' => ['show' => true],
        ]);
        $d3->series()->loop(0, 14, 0.5, 'Math.cos');

        // Add the d4 graph.
        $d4 = $plot->graph([
            'lines' => ['show' => true],
        ]);
        $d4->series()->loop(0, 14, 0.5, 'plot.d4.value');

        // Add the d5 graph.
        $d5 = $plot->graph([
            'lines' => ['show' => true],
            'points' => ['show' => true],
        ]);
        $d5->series()->loop(0, 14, 0.5, 'Math.sqrt');

        // Add the d6 graph.
        $d6 = $plot->graph([
            'lines' => ['show' => true, 'steps' => true],
        ]);
        $d6->series()->loop(0, 14, 'plot.d6.step', 'plot.d6.value');

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
