jaxon.dom.ready(() => {
    // Register new commands to set the text value and color.
    // The parameters values are set when calling the command in PHP.
    jaxon.register('text.value', ({ eltId, value }) => {
        const element = document.getElementById(eltId);
        if (element !== null) {
            element.innerHTML = value;
        }
    });

    jaxon.register('text.color', ({ eltId, color }) => {
        const element = document.getElementById(eltId);
        if (element !== null) {
            element.style.color = color;
        }
    });
});
