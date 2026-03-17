var plot = {
    d3: {
        value: x => (x < 3 || x > 5) ? Math.cos(x) : null,
    },
    d5: {
        value: x => 30 * Math.sin(x / 2 + 3),
    },
};
