    jaxon.dom.ready(() => {
        <?= rq('App.Test.Test')->sayHello(0, false) ?>;
        <?= rq('App.Test.Test')->setColor(Jaxon\select('colorselect1'), false) ?>;
        <?= rq('Ext.Test.Test')->sayHello(0, false) ?>;
        <?= rq('Ext.Test.Test')->setColor(Jaxon\select('colorselect2'), false) ?>;
    });
