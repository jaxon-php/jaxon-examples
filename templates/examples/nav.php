<?php
$current = menu_current();
?>
        <div class="row nav-examples">
            <div class="col-12">
                <a href="/"><span class="badge bg-<?= $current === '' ?
                    'primary' : 'secondary'; ?>">Home</span></a>
<?php foreach(menu_entries() as $example => $page): ?>
                <a href="<?= menu_url($example) ?>"><span class="badge bg-<?= 
                    $current === $example ? 'primary' : 'secondary'; ?>"><?=
                    $page['title'] ?></span></a>
<?php endforeach ?>
            </div>
        </div>
