    jaxon.dom.ready(() => {
        // call the helloWorld function to populate the div on load
        App.Test.Test.sayHello(0, false);
        // call the setColor function on load
        App.Test.Test.setColor(jaxon.$('colorselect1').value, false);
        // Call the HelloWorld class to populate the 2nd div
        Ext.Test.Test.sayHello(0, false);
        // call the HelloWorld->setColor() method on load
        Ext.Test.Test.setColor(jaxon.$('colorselect2').value, false);
    });
