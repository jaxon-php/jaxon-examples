<?php

require(__DIR__ . '/defs.php');
require(__DIR__ . '/../../../includes/header.php');

use Lagdo\Supervisor\Package;
use function Jaxon\jaxon;

$package = jaxon()->package(Package::class);
// Run the package init after page load.
$package->ready();
?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 sidebar">
<?php require(__DIR__ . '/../../../includes/nav.php') ?>
            </div>

            <div class="col-sm-9 content">
<?php require(__DIR__ . '/../../../includes/title.php') ?>

                <div class="row">
                    <div class="col-md-12">
                        <?php echo $package->getHtml() ?>
                    </div>
                </div>
            </div> <!-- class="content" -->
       </div> <!-- class="row" -->
    </div>

<?php require(__DIR__ . '/../../../includes/footer.php') ?>
