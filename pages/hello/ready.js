    jaxon.dom.ready(() => {
        // call the helloWorld function to populate the div on load
        <?= rq()->helloWorld(0) ?>;
        // call the setColor function on load
        <?= rq()->setColor(je('colorselect')->rd()->select()) ?>;
    });
