<?php

require(__DIR__ . '/defs.php');
require(__DIR__ . '/../../includes/header.php');
?>

    <div class="container-fluid">
        <div class="row">
<?php require(__DIR__ . '/../../includes/nav.php') ?>
            <div class="col-sm-9 content">
                <h3 class="page-header">Hello World Class</h3>

                <div class="row" id="jaxon-html">
                        <div class="col-md-12" id="div2">
                            Showing page number 1
                        </div>
                        <div class="col-md-12 margin-vert-10" id="pagination">
                            <?php echo rq('HelloWorld')->showPage()->paginate(1, 10, 150) ?>
                        </div>
                </div>
            </div> <!-- class="content" -->
       </div> <!-- class="row" -->
    </div>
<div id="jaxon-init">
<script type='text/javascript'>
    /* <![CDATA[ */
    window.onload = function() {
    }
    /* ]]> */
</script>
</div>

<?php require(__DIR__ . '/../../includes/footer.php') ?>
