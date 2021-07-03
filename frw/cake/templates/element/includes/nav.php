            <div class="col-sm-2 sidebar">
                <ul class="nav nav-sidebar">
<?php foreach($menuEntries as $filename => $title): ?>
                    <li<?php if($filename == 'cake/') echo ' class="active"'; ?>><a href="<?php echo $menuSubdir, $filename ?>"><?php echo $title ?></a></li>
<?php endforeach ?>
                </ul>
            </div>
