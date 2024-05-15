<?php require(__DIR__ . '/../includes/header.php') ?>

    <div class="container-fluid">
        <div class="row">
<?php require(__DIR__ . '/../includes/nav.php') ?>
            <div class="col-sm-9 content">
                <h3 class="page-header">Jaxon Examples</h3>

                <div class="row col-md-12">
<p>
All examples are variants of the helloword.php example in the original Jaxon repository at
<a href="https://github.com/Xajax/Xajax/blob/master/examples/helloworld.php" target="_blank">
https://github.com/Xajax/Xajax/blob/master/examples/helloworld.php</a>.
</p>
                </div>

<?php foreach($menuEntries as $uri => $page): ?>
                <div class="row col-md-12">
<h5 style="margin-top:15px;"><a href="<?php echo $uri ?>"><?php echo $page['title'] ?></a></h5>
<?php echo $page['desc'] ?>
                </div>
<?php endforeach ?>


            </div> <!-- class="content" -->
       </div> <!-- class="row" -->
    </div>
<?php require(__DIR__ . '/../includes/footer.php') ?>
