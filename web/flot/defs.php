<?php

require(__DIR__ . '/../../vendor/autoload.php');

use Jaxon\Jaxon;

class Flot extends \Jaxon\CallableClass
{
    public function drawGraph()
    {
        // Create a new plot, to be displayed in the div with id "flot"
        $plot = $this->response->flot->plot('#flot')->width('600px')->height('300px');
        // Set the ticks on X axis
        // $ticks = [];
        // for($i = 0; $i < 10; $i++) $ticks[] = [$i, 'Pt' . $i];
        // $plot->xaxis()->points($ticks);
        $plot->xaxis()->expr(1, 14, 1, "'Pt' + x");
        // Add a graph to the plot
        $graph = $plot->graph(['lines' => ['show' => true], 'label' => 'Sqrt']);
        $graph->series()->expr(0, 14, 0.5, 'Math.sqrt(x * 10)', "series + '(' + x + ' * 10) = ' + y");
        $graph = $plot->graph(['lines' => ['show' => true], 'points' => ['show' => true], 'label' => 'Graph 2']);
        $graph->series()->points([[0, 3, 'Pt 1'], [4, 8, 'Pt 2'], [8, 5, 'Pt 3'], [9, 13, 'Pt 4']]);
        $this->response->flot->draw($plot);
        // Return the response
        return $this->response;
    }
}

// Register object
$jaxon = jaxon();

// Request processing URI
$jaxon->setOption('core.request.uri', 'ajax.php');

$jaxon->register(Jaxon::CALLABLE_CLASS, Flot::class);
