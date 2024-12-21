<?php

require(__DIR__ . '/defs.php');
require(__DIR__ . '/../../../includes/header.php');

use function Jaxon\attr;
use function Jaxon\rq;

$rqPageContent = rq(PageContent::class);
?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 sidebar">
<?php require(__DIR__ . '/../../../includes/nav.php') ?>
            </div>

            <div class="col-sm-9 content">
<?php require(__DIR__ . '/../../../includes/title.php') ?>

                <div class="row">
                    <!-- Custom attribute: Component for paginated content. -->
                    <div class="col-md-12" <?php echo attr()->bind($rqPageContent) ?>>
                    </div>
                    <!-- Custom attribute: Component for pagination links. -->
                    <div class="col-md-12 margin-vert-10" <?php echo attr()->pagination($rqPageContent) ?>>
                    </div>
                </div>
            </div> <!-- class="content" -->
       </div> <!-- class="row" -->
    </div>
<div id="jaxon-init">
<script type='text/javascript'>
    /* <![CDATA[ */
    window.onload = function() {
        <?php echo $rqPageContent->showPage(1) ?>;
    }
    /* ]]> */
</script>
</div>

<?php require(__DIR__ . '/../../../includes/footer.php') ?>
