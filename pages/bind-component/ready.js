    jaxon.dom.ready(() => {
        // Call the HelloWorld class to populate the 2nd div
        <?= rq('HelloWorld')->sayHello(0) ?>;
        // call the HelloWorld->setColor() method on load
        <?= rq('HelloWorld')->setColor(je('colorselect')->rd()->select()) ?>;
    });
