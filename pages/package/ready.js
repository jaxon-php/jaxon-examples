    jaxon.dom.ready(() => {
        <?= rq('App.Test.Test')->sayHello(0, false) ?>;
        <?= rq('App.Test.Test')->setColor(je('colorselect1')->rd()->select(), false) ?>;
        <?= rq('Ext.Test.Test')->sayHello(0, false) ?>;
        <?= rq('Ext.Test.Test')->setColor(je('colorselect2')->rd()->select(), false) ?>;
    });
