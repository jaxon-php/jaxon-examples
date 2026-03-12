<?php $this->extends('templates::examples/layout.php') ?>

<?php $this->block('content') ?>
<?php $this->include("examples::{$this->page}/page.php") ?>
<?php $this->endblock() ?>

<?php $this->block('code') ?>
                <div class="card code">
                    <div class="card-body">
                        <?= renderCodeSource($this->page) ?>
                    </div>
                </div>
<?php $this->endblock() ?>

<?php $this->block('javascript') ?>
<script type='text/javascript'>
<?php $this->include("examples::{$this->page}/ready.js") ?>
</script>
<?php $this->endblock() ?>
