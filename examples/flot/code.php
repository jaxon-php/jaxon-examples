<?php

use Jaxon\Jaxon;
use Jaxon\Flot\FlotPlugin;

class Flot extends \Jaxon\App\FuncComponent
{
    public function drawGraph()
    {
        $flot = $this->response->plugin(FlotPlugin::class);
        // Create a new plot, to be displayed in the div with id "flot"
        $plot = $flot->plot('#flot')->width('450px')->height('300px');
        // Set the ticks on X axis
        // $ticks = [];
        // for($i = 0; $i < 10; $i++) $ticks[] = [$i, 'Pt' . $i];
        // $plot->xaxis()->points($ticks);
        $plot->xaxis()->expr(0, 16, 1, 'plots.xaxis.label');

        // Add a first graph to the plot
        $graph = $plot->graph(['lines' => ['show' => true], 'label' => 'Sqrt']);
        $graph->series()
            ->expr(0, 14, 0.5, 'plots.sqrt.value', 'plots.sqrt.label');

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
}

// Register object
$jaxon = jaxon();

$jaxonAppDir = dirname(__DIR__, 2) . '/public/app';
$jaxonAppURI = '/app';

$jaxon->setOption('js.app.export', true);
$jaxon->setOption('js.app.dir', $jaxonAppDir);
$jaxon->setOption('js.app.uri', $jaxonAppURI);
$jaxon->setOption('js.app.minify', false); // Optionally, the file can be minified

$jaxon->setOption('js.lib.uri', '/js');
$jaxon->register(Jaxon::CALLABLE_CLASS, Flot::class);
