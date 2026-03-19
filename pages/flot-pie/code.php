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

        // Set the plot options
        $plot->options([
            'series' => [
                'pie' => [
                    'show' => true,
                    'radius' => 1,
                    'innerRadius' => 0.5,
                    'label' => [
                        'show' => true,
                        'radius' => 1,
                        'formatter' => 'plot.pie.label',
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
        $plot->pie()->slices([
            [3, 'Pt 1'],
            [8, 'Pt 2'],
            [5, 'Pt 3'],
            [13, 'Pt 4'],
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

// The Javascript pie plugin for Flot needs to be loaded.
$jaxon->di()->g(FlotPlugin::class)->usePie(true);
