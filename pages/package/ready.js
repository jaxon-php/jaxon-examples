    jaxon.dom.ready(() => {
        <?= rq('App.Test.Test')->sayHello(0, false) ?>;
        <?= rq('App.Test.Test')->setColor(Jaxon\select('hello-color-one'), false) ?>;
        <?= rq('Ext.Test.Test')->sayHello(0, false) ?>;
        <?= rq('Ext.Test.Test')->setColor(Jaxon\select('hello-color-two'), false) ?>;
    });
