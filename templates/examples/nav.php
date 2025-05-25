        <div class="row nav-examples">
            <div class="col-12">
                <a href="/"><span class="badge bg-<?php echo $this->requestUri === '/' ?
                    'primary' : 'secondary'; ?>">Home</span></a>
<?php foreach($this->menuEntries as $uri => $page): ?>
                <a href="<?php echo $uri ?>"><span class="badge bg-<?php 
                    echo $this->requestUri === $uri ? 'primary' : 'secondary'; ?>"><?php
                    echo $page['title'] ?></span></a>
<?php endforeach ?>
            </div>
        </div>
