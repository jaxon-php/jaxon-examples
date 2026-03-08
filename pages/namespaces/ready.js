    jaxon.dom.ready(() => {
        <?= rq('App.Test.Test')->sayHello(0, false) ?>;
        <?= rq('App.Test.Test')->setColor(jq('#colorselect1')->val(), false) ?>;
        <?= rq('Ext.Test.Test')->sayHello(0, false) ?>;
        <?= rq('Ext.Test.Test')->setColor(jq('#colorselect2')->val(), false) ?>;
    });
