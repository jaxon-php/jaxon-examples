jaxon.dom.ready(() => {
    // Call the HelloWorld class to populate the 2nd div
    <?= rq()->helloWorld(0) ?>;
    // call the HelloWorld->setColor() method on load
    <?= rq()->setColor(Jaxon\select('colorselect')) ?>;
});
