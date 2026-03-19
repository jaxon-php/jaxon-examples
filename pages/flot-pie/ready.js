var plot = {
    pie: {
        label: (label, series) =>
            "<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>" +
                label + "<br/>" + Math.round(series.percent) + "%</div>",
    },
};
