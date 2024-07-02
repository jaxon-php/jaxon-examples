<?php
use function Jaxon\attr;
?>
<button type="button" class="btn btn-primary" <?php echo attr()->on('click', $this->test->sayHello(1)) ?>>CLICK ME</button>
<button type="button" class="btn btn-primary" <?php echo attr()->on('click', $this->test->sayHello(0)) ?>>Click Me</button>
