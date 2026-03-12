jaxon.dom.ready(() => {
    // Set event handlers
    <?= jq('#colorselect')
        ->on('change', rq('HelloWorld')->setColor(Jaxon\select('colorselect'))
            ->confirm('Set color to {1}', Jaxon\select('colorselect'))) ?>;
    <?= jq('#btn-uppercase')
        ->on('click', rq('HelloWorld')->sayHello(1)
            ->confirm('Convert to uppercase?')) ?>;
    <?= jq('#btn-lowercase')
        ->on('click', rq('HelloWorld')->sayHello(0)
            ->confirm('Convert to lowercase?')) ?>;
    // Call the HelloWorld class to populate the 2nd div
    <?= rq('HelloWorld')->sayHello(0) ?>;
});
