            <div class="col-sm-3 sidebar">
                <ul class="nav nav-sidebar">
<?php foreach($menuEntries as $filename => $title): ?>
                    <li<?php if($filename == 'yii/') echo ' class="active"'; ?>><a href="/exp/<?php echo $filename ?>"><?php echo $title ?></a></li>
<?php endforeach ?>
                </ul>
            </div>
