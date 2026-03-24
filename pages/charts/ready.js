var chart = {
    flot: {
        xaxis: {
            label: x => `Pt${x}`,
        },
        sqrt: {
            value: x => Math.sqrt(x * 50),
            label: (x, y, label) => `${label}(${x} * 50) = ${y}`, // label is the series label.
        },
        types: {
            d4: {
                value: i => Math.sqrt(i * 10),
            },
            d6: {
                step: () => 0.5 + Math.random(),
                value: i => Math.sqrt(2*i + Math.sin(i) + 5),
            },
        },
        axes: {
            d3: {
                value: x => (x < 3 || x > 5) ? Math.cos(x) : null,
            },
            d5: {
                value: x => 30 * Math.sin(x / 2 + 3),
            },
        },
        pie: {
            label: (label, series) =>
                "<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>" +
                    label + "<br/>" + Math.round(series.percent) + "%</div>",
        },
    },
};
