<?php

require __DIR__ . '/defs.php';
require dirname(__DIR__, 3) . '/includes/header.php';
use function Jaxon\rq;
?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 sidebar">
<?php require dirname(__DIR__, 3) . '/includes/nav.php' ?>
            </div>

            <div class="col-sm-9 content">
<?php require dirname(__DIR__, 3) . '/includes/title.php' ?>

                <div class="row" id="jaxon-html">
                        <div class="col-md-12" id="div2">
                            Showing page number 1
                        </div>
                        <div class="col-md-12 margin-vert-10" id="pagination">
                        </div>
                </div>
            </div> <!-- class="content" -->
       </div> <!-- class="row" -->
    </div>
<div id="jaxon-init">
<script type='text/javascript'>
    /* <![CDATA[ */
    window.onload = function() {
        <?php echo rq('HelloWorld')->showPage(1) ?>;
    }
    /* ]]> */
</script>
</div>

<?php require dirname(__DIR__, 3) . '/includes/footer.php' ?>
