<?php $this->extends('examples::layout.php') ?>

<?php
use function Jaxon\rq;
?>

<?php $this->block('content') ?>
                <div class="row">
                    <div class="col-md-12" id="div2">
                        Showing page number 1
                    </div>
                    <div class="col-md-12" id="pagination">
                    </div>
                </div>
<?php $this->endblock() ?>

<?php $this->block('code') ?>
                <div class="card code">
                    <div class="card-body">
                        <?= highlight_file(__DIR__ . '/code.php', true) ?>
                    </div>
                </div>
<?php $this->endblock() ?>

<?php $this->block('javascript') ?>
<script type='text/javascript'>
    /* <![CDATA[ */
    window.onload = function() {
        <?php echo rq('HelloWorld')->showPage(1) ?>;
    }
    /* ]]> */
</script>
<?php $this->endblock() ?>
