    jaxon.dom.ready(() => {
        <?= rq('App')->sayHello(0, false) ?>;
        <?= rq('App')->setColor(je('colorselect1')->rd()->select(), false) ?>;
        <?= rq('Ext')->sayHello(0, false) ?>;
        <?= rq('Ext')->setColor(je('colorselect2')->rd()->select(), false) ?>;
    });
