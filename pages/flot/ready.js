var plot = {
    xaxis: {
        label: x => `Pt${x}`,
    },
    sqrt: {
        value: x => Math.sqrt(x * 50),
        label: (x, y, label) => `${label}(${x} * 50) = ${y}`, // label is the series label.
    },
};
