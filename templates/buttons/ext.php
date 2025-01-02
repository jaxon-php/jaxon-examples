<button type="button" class="btn btn-primary" <?php echo Jaxon\attr()->click($this->test->sayHello(true)) ?>>CLICK ME</button>
<button type="button" class="btn btn-primary" <?php echo Jaxon\attr()->click($this->test->sayHello(false)) ?> >Click Me</button>
