<?php

require (__DIR__ . '/vendor/autoload.php');

use Jaxon\Jaxon;
use Jaxon\Response\Response;
use Jaxon\Response\Manager as ResponseManager;

class Flot
{
    public function drawGraph()
    {
        $xResponse = new Response();
        // Create a new plot, to be displayed in the div with id "flot"
        $plot = $xResponse->flot->plot('#flot')->width('600px')->height('300px');
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
        $xResponse->flot->draw($plot);
        // Return the response
        return $xResponse;
    }
}

// Register object
$jaxon = jaxon();

$xCallableObject = new Flot();
$jaxon->register(Jaxon::CALLABLE_OBJECT, $xCallableObject);

// Process the request, if any.
if($jaxon->canProcessRequest())
{
    $jaxon->processRequest();
}

require(__DIR__ . '/includes/header.php')
?>

    <div class="container-fluid">
        <div class="row">
<?php require(__DIR__ . '/includes/nav.php') ?>
            <div class="col-sm-9 content">
                <h3 class="page-header">Graphs with the PLot library</h3>

                <div class="row" id="jaxon-html">
                        <div class="col-md-12">
                            <div id="flot">
                                &nbsp;
                            </div>
                        </div>
                        <div class="col-md-8 margin-vert-10">
                            <button type="button" class="btn btn-primary" onclick="<?php echo rq()->call('Flot.drawGraph') ?>" >CLICK ME</button>
                        </div>

                </div>
            </div> <!-- class="content" -->
       </div> <!-- class="row" -->
    </div>
<div id="jaxon-init">
<script type='text/javascript'>
    /* <![CDATA[ */
    window.onload = function() {
        // Call the Flot class to populate the 2nd div
        // <?php echo rq()->call('Flot.drawGraph') ?>;
    }
    /* ]]> */
</script>
</div>

<?php require(__DIR__ . '/includes/footer.php') ?>
