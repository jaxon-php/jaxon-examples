<?php
require_once __DIR__ . '/menu.php';

$menuEntries = menu_entries();
?>
<?php $this->include('examples::header.php') ?>

    <div class="container-fluid">
<?php $this->include('examples::nav.php', [
    'menuEntries' => $menuEntries,
    'requestUri' => '/',
]) ?>

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
<?php foreach($menuEntries as $uri => $page): ?>
                <div class="row col-md-12">
                    <div class="col-md-12">
<h5 style="margin-top:15px;"><a href="<?php echo $uri ?>"><?php echo $page['title'] ?></a></h5>
<?php echo $page['desc'] ?>
                    </div>
                </div>
<?php endforeach ?>

            </div> <!-- class="content" -->
        </div> <!-- class="row" -->

<?php $this->include('examples::footer.php') ?>
