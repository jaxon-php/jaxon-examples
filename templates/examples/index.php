<?php $this->include('templates::examples/header.php') ?>

    <div class="container-fluid">
<?php $this->include('templates::examples/nav.php') ?>

        <div class="row">
            <div class="col-md-12 content">
                <h3 class="page-header">Jaxon Examples</h3>

                <div class="row">
                    <div class="col-md-12">
<p>
Most of those examples are variants of the helloword.php example in the original Jaxon repository at
<a href="https://github.com/Xajax/Xajax/blob/master/examples/helloworld.php" target="_blank">
https://github.com/Xajax/Xajax/blob/master/examples/helloworld.php</a>.
</p>
                    </div>
                </div>
<?php foreach(menu_entries() as $example => $page): ?>
                <div class="row col-md-12">
                    <div class="col-md-12">
<h5 style="margin-top:15px;"><a href="<?= menu_url($example) ?>"><?= $page['title'] ?></a></h5>
<?= $page['desc'] ?>
                    </div>
                </div>
<?php endforeach ?>

            </div> <!-- class="content" -->
        </div> <!-- class="row" -->

<?php $this->include('templates::examples/footer.php') ?>
