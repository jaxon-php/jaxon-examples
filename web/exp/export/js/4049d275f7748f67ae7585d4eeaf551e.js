try {
    if(typeof jaxon.config == undefined)
        jaxon.config = {};
}
catch(e) {
    jaxon = {};
    jaxon.config = {};
};

jaxon.config.requestURI = "ajax.php";
jaxon.config.statusMessages = false;
jaxon.config.waitCursor = true;
jaxon.config.version = "Jaxon 4.x";
jaxon.config.defaultMode = "asynchronous";
jaxon.config.defaultMethod = "POST";
jaxon.config.responseType = "JSON";

JaxonHelloWorld = {};
JaxonHelloWorld.setup = function() {
    return jaxon.request({ jxncls: 'HelloWorld', jxnmthd: 'setup' }, { parameters: arguments });
};
JaxonHelloWorld.sayHello = function() {
    return jaxon.request({ jxncls: 'HelloWorld', jxnmthd: 'sayHello' }, { parameters: arguments });
};
JaxonHelloWorld.setColor = function() {
    return jaxon.request({ jxncls: 'HelloWorld', jxnmthd: 'setColor' }, { parameters: arguments });
};

/**
 * Bootbox dialogs plugin
 * Class: jaxon.dialog.lib.bootbox
 */

jaxon.dialog.lib.register('bootbox', (self, { dom, js, types, jq, labels }) => {
    const dialogContainer = 'bootbox-container';

    // Append the dialog container to the page HTML code.
    dom.ready(() => {
        if(!jq('#' + dialogContainer).length)
        {
            jq('body').append('<div id="' + dialogContainer + '"></div>');
        }
    });

    const dialogHtml = (title, content, buttons) => {
        return `
    <div id="styledModal" class="modal modal-styled">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title">${title}</h3>
                </div>
                <div class="modal-body">
${content}
                </div>
                <div class="modal-footer">` +
            buttons.map(({ title, class: btnClass, click }, btnIndex) => {
                return types.isObject(click) ?
`
                    <button type="button" class="${btnClass}" id="bootbox-dlg-btn${btnIndex}">${title}</button>` :
`
                    <button type="button" class="${btnClass}" data-dismiss="modal">${title}</button>`;
            }).reduce((sButtons, sButton) => sButtons + sButton, '') +
`
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->`;
    };

    /**
     * Show the modal dialog
     *
     * @param {string} title The dialog title
     * @param {string} content The dialog HTML content
     * @param {array} buttons The dialog buttons
     * @param {array} options The dialog options
     * @param {int} options.width The dialog options
     *
     * @returns {void}
     */
    self.show = (title, content, buttons, { width }) => {
        jq('#' + dialogContainer).html(dialogHtml(title, content, buttons));
        jq('#styledModal').modal('show');
        width && jq('.modal-dialog').css('width', `${width}px`);
        // Set the buttons onclick handlers
        buttons.forEach(({ click }, btnIndex) => {
            types.isObject(click) &&
                jq(`#bootbox-dlg-btn${btnIndex}`).click(() => js.execCall(click));
        });
    };

    /**
     * Hide the modal dialog
     *
     * @returns {void}
     */
    self.hide = () => jq('#styledModal').modal('hide');

    const xTypes = {
        success: 'success',
        info: 'info',
        warning: 'warning',
        error: 'danger',
    };

    /**
     * Show an alert message
     *
     * @param {string} type The message type
     * @param {string} text The message text
     * @param {string} title The message title
     *
     * @returns {void}
     */
    self.alert = (type, text, title) => {
        const html = '<div class="alert alert-' + (xTypes[type] ?? xTypes.info) +
            '" style="margin-top:15px;margin-bottom:-15px;">' +
            (!title ? '' : '<strong>' + title + '</strong><br/>') + text + '</div>';
        bootbox.alert(html);
    };

    /**
     * @param {string} question The question to ask
     * @param {string} title The question title
     * @param {callback} yesCallback The function to call if the answer is yes
     * @param {callback} noCallback The function to call if the answer is no
     *
     * @returns {void}
     */
    self.confirm = (question, title, yesCallback, noCallback) => {
        bootbox.confirm({
            title: title,
            message: question,
            buttons: {
                cancel: {label: labels.no},
                confirm: {label: labels.yes}
            },
            callback: (res) => {
                if(res)
                    yesCallback();
                else if((noCallback))
                    noCallback();
            }
        });
    };
});

/**
 * Class: jaxon.dialog.lib.noty
 */

jaxon.dialog.lib.register('noty', (self, { labels }) => {
    const xTypes = {
        success: 'success',
        info: 'information',
        warning: 'warning',
        error: 'error',
    };

    /**
     * Show an alert message
     *
     * @param {string} type The message type
     * @param {string} text The message text
     * @param {string} title The message title
     *
     * @returns {void}
     */
    self.alert = (type, text, title) => {
        new Noty({
            text,
            type: xTypes[type] ?? xTypes.info,
            layout: 'topCenter',
            timeout: 5000,
        }).show();
    };

    /**
     * @param {string} question The question to ask
     * @param {string} title The question title
     * @param {callback} yesCallback The function to call if the answer is yes
     * @param {callback} noCallback The function to call if the answer is no
     *
     * @returns {void}
     */
    self.confirm = (question, title, yesCallback, noCallback) => {
        const noty = new Noty({
            theme: 'relax',
            text: question,
            layout: 'topCenter',
            buttons: [
                Noty.button(labels.yes, 'btn btn-success', () => {
                    noty.close();
                    yesCallback();
                }, {'data-status': 'ok'}),
                Noty.button(labels.no, 'btn btn-error', () => {
                    noty.close();
                    noCallback && noCallback();
                }),
            ],
        });
        noty.show();
    };
});

jaxon.dom.ready(function() {
/*
 * Jaxon Flot plugin
 */
    $("#flot-tooltip").remove();
    $('<div id="flot-tooltip"></div>').css({
        position: "absolute",
        display: "none",
        border: "1px solid #fdd",
        padding: "2px",
        "background-color": "#fee",
        opacity: 0.80
    }).appendTo("body");

    jaxon.register("flot.plot", function({ plot: { selector, graphs, size, xaxis, yaxis, options = {} } }) {
        let showLabels = false;
        const labels = {};
        // Set container size
        if(size.width !== "")
        {
            $(selector).css({width: size.width});
        }
        if(size.height !== "")
        {
            $(selector).css({height: size.height});
        }

        const _graphs = graphs.map(g => {
            const graph = g.options || {};
            graph.data = [];
            if(g.values.data !== null)
            {
                graph.data = g.points.map(x => [x, g.values.data[x]]);
            }
            else if(g.values.func !== null)
            {
                g.values.func = new Function("x", g.values.func);
                graph.data = g.points.map(x => [x, g.values.func(x)]);
            }
            if(g.labels.func !== null)
            {
                g.labels.func = new Function("series,x,y", g.labels.func);
            }
            if(typeof g.options.label !== "undefined" &&
                (g.labels.data !== null || g.labels.func !== null))
            {
                showLabels = true;
                labels[g.options.label] = g.labels;
            }
            return graph;
        });

        // Setting ticks
        if(xaxis.points.length > 0)
        {
            let ticks = [];
            if(xaxis.labels.data !== null)
            {
                ticks = xaxis.points.map(point => [point, xaxis.labels.data[point]]);
            }
            else if(xaxis.labels.func !== null)
            {
                xaxis.labels.func = new Function("x", xaxis.labels.func);
                ticks = xaxis.points.map(point => [point, xaxis.labels.func(point)]);
            }
            if(ticks.length > 0)
            {
                options.xaxis = {ticks: ticks};
            }
        }
        /*if(yaxis.points.length > 0)
        {
        }*/

        if(showLabels)
        {
            options.grid = {hoverable: true};
        }
        $.plot(selector, _graphs, options);

        // Labels
        if(showLabels)
        {
            $(selector).bind("plothover", function (event, pos, item) {
                if(!item)
                {
                    $("#flot-tooltip").hide();
                    return;
                }
                const series = item.series.label;
                const x = item.datapoint[0]; // item.datapoint[0].toFixed(2);
                const y = item.datapoint[1]; // item.datapoint[1].toFixed(2);
                let tooltip = "";
                if(typeof labels[series] !== "undefined")
                {
                    const _labels = labels[series];
                    if(_labels.data != null && typeof _labels.data[x] !== "undefined")
                    {
                        tooltip = _labels.data[x];
                    }
                    else if(_labels.func != null)
                    {
                        tooltip = _labels.func(series, x, y);
                    }
                }
                if((tooltip))
                {
                    $("#flot-tooltip").html(tooltip).css({top: item.pageY+5, left: item.pageX+5}).fadeIn(200);
                }
            });
        }
        return true;
    });
});