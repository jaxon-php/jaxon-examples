<?php
use function Jaxon\attr;
?>
<button type="button" class="btn btn-primary" jxn-on="click"
    jxn-func="<?php echo attr()->func($this->test->sayHello(1)) ?>" >CLICK ME</button>
<button type="button" class="btn btn-primary" jxn-on="click"
    jxn-func="<?php echo attr()->func($this->test->sayHello(0)) ?>" >Click Me</button>
