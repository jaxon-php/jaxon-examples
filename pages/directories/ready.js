    jaxon.dom.ready(() => {
        <?= rq('App')->sayHello(0, false) ?>;
        <?= rq('App')->setColor(Jaxon\select('colorselect1'), false) ?>;
        <?= rq('Ext')->sayHello(0, false) ?>;
        <?= rq('Ext')->setColor(Jaxon\select('colorselect2'), false) ?>;
    });
