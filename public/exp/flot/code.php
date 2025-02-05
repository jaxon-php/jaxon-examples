<?php

use Jaxon\Jaxon;
use function Jaxon\jaxon;

class Flot extends \Jaxon\App\CallableClass
{
    public function drawGraph()
    {
        // Create a new plot, to be displayed in the div with id "flot"
        $plot = $this->response->flot->plot('#flot')->width('450px')->height('300px');
        // Set the ticks on X axis
        // $ticks = [];
        // for($i = 0; $i < 10; $i++) $ticks[] = [$i, 'Pt' . $i];
        // $plot->xaxis()->points($ticks);
        $plot->xaxis()->expr(0, 16, 1, 'plots.xaxis.label');

        // Add a first graph to the plot
        $graph = $plot->graph(['lines' => ['show' => true], 'label' => 'Sqrt']);
        $graph->series()->expr(0, 14, 0.5, 'plots.sqrt.value', 'plots.sqrt.label');

        // Add a second graph to the plot
        $graph = $plot->graph(['lines' => ['show' => true], 'points' => ['show' => true], 'label' => 'Graph 2']);
        $graph->series()->points([[0, 3, 'Pt 1'], [4, 8, 'Pt 2'], [8, 5, 'Pt 3'], [9, 13, 'Pt 4']]);

        // Draw the graph
        $this->response->flot->draw($plot);
        // Return the response
    }
}

// Register object
$jaxon = jaxon();

// Request processing URI
$jaxon->setOption('js.lib.uri', '/js');
$jaxon->setOption('core.request.uri', 'ajax.php');

$jaxon->register(Jaxon::CALLABLE_CLASS, Flot::class);
