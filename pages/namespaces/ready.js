    jaxon.dom.ready(() => {
        <?= rq('App.Test.Test')->sayHello(0, false) ?>;
        <?= rq('App.Test.Test')->setColor(jq('#hello-color-one')->val(), false) ?>;
        <?= rq('Ext.Test.Test')->sayHello(0, false) ?>;
        <?= rq('Ext.Test.Test')->setColor(jq('#hello-color-two')->val(), false) ?>;
    });
