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

        // Create multiple X axes.
        $plot->xaxis()->options(['position' => 'bottom']);
        $plot->xaxis()->options(['position' => 'bottom']);
        $plot->xaxis()->options(['position' => 'top']);
        // Create multiple Y axes.
        $plot->yaxis()->options(['position' => 'left']);
        $plot->yaxis()->options(['position' => 'left']);
        $plot->yaxis()->options(['position' => 'right']);
        $plot->yaxis()->options(['position' => 'left']);
        $plot->yaxis()->options(['position' => 'right']);

        // Note: the added .01 in the loop end values are to have <= instead of <.

        // Add the d1 graph.
        $d1 = $plot->graph([
            'xaxis' => 1, 'yaxis' => 1, 'lines' => ['show' => true, 'fill' => true],
        ]);
        $d1->series()->loop(0, 10.01, 1/4, 'Math.sqrt');

        // Add the d1 graph.
        $d2 = $plot->graph([
            'xaxis' => 1, 'yaxis' => 2, 'points' => ['show' => true],
        ]);
        $d2->series()->loop(0, 10.01, 1/4, 'Math.sin');

        // Add the d1 graph.
        $d3 = $plot->graph([
            'xaxis' => 1, 'yaxis' => 3,
        ]);
        $d3->series()->loop(0, 10.01, 1/4, 'plot.d3.value');

        // Add the d1 graph.
        $d4 = $plot->graph([
            'xaxis' => 2, 'yaxis' => 4, 'lines' => ['show' => true, 'steps' => true],
        ]);
        $d4->series()->loop(2, 10.01, 1/5, 'Math.tan');

        // Add the d1 graph.
        $d5 = $plot->graph([
            'xaxis' => 3, 'yaxis' => 5, 'bars' => ['show' => true, 'fill' => true, 'barWidth' => 0.1, 'align' => 'center'],
        ]);
        $d5->series()->loop(5, 15.01, 1/4, 'plot.d5.value');

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
