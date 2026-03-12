jaxon.dom.ready(() => {
    <?= rq('App')->sayHello(0, false) ?>;
    <?= rq('App')->setColor(Jaxon\select('hello-color-one'), false) ?>;
    <?= rq('Ext')->sayHello(0, false) ?>;
    <?= rq('Ext')->setColor(Jaxon\select('hello-color-two'), false) ?>;
});
