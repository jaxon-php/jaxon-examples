var plot = {
    d4: {
        value: i => Math.sqrt(i * 10),
    },
    d6: {
        step: () => 0.5 + Math.random(),
        value: i => Math.sqrt(2*i + Math.sin(i) + 5),
    },
};
