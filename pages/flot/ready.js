    var plots = {
        xaxis: {
            label: x => `x${x}`,
        },
        sqrt: {
            value: x => Math.sqrt(x * 50),
            label: (series, x, y) => `${series}(${x} * 50) = ${y}`,
        },
    };
    jaxon.dom.ready(() => {
        // Call the Flot class to populate the 2nd div
        // <?= rq(Flot::class)->drawGraph() ?>;
    });
