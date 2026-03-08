    jaxon.dom.ready(() => {
        <?= rq(App\Test\Test::class)->sayHello(true) ?>;
        <?= rq(Ext\Test\Test::class)->sayHello(true) ?>;
    });
