/*
    Class: jaxon.config

    This class contains all the default configuration settings.  These
    are application level settings; however, they can be overridden
    by including a jaxon.config definition prior to including the
    <jaxon_core.js> file, or by specifying the appropriate configuration
    options on a per call basis.
*/
var jaxon = {};

/*
    Class: jaxon.config

    This class contains all the default configuration settings.  These
    are application level settings; however, they can be overridden
    by including a jaxon.config definition prior to including the
    <jaxon_core.js> file, or by specifying the appropriate configuration
    options on a per call basis.
*/
jaxon.config = {};

/*
Class: jaxon.debug
*/
jaxon.debug = {};

/*
    Class: jaxon.debug.verbose

    Provide a high level of detail which can be used to debug hard to find problems.
*/
jaxon.debug.verbose = {}

/*
Class: jaxon.ajax
*/
jaxon.ajax = {};

/*
Class: jaxon.tools

This contains utility functions which are used throughout
the jaxon core.
*/
jaxon.tools = {};

/*
Class: jaxon.cmd

Contains the functions for page content, layout, functions and events.
*/
jaxon.cmd = {};

/*
Function: jaxon.config.setDefault

This function will set a default configuration option if it is not already set.

Parameters:
option - (string):
The name of the option that will be set.

defaultValue - (unknown):
The value to use if a value was not already set.
*/
jaxon.config.setDefault = function(option, defaultValue) {
    if ('undefined' == typeof jaxon.config[option])
        jaxon.config[option] = defaultValue;
};

/*
Object: commonHeaders

An array of header entries where the array key is the header
option name and the associated value is the value that will
set when the request object is initialized.

These headers will be set for both POST and GET requests.
*/
jaxon.config.setDefault('commonHeaders', {
    'If-Modified-Since': 'Sat, 1 Jan 2000 00:00:00 GMT'
});

/*
Object: postHeaders

An array of header entries where the array key is the header
option name and the associated value is the value that will
set when the request object is initialized.
*/
jaxon.config.setDefault('postHeaders', {});

/*
Object: getHeaders

An array of header entries where the array key is the header
option name and the associated value is the value that will
set when the request object is initialized.
*/
jaxon.config.setDefault('getHeaders', {});

/*
Boolean: waitCursor

true - jaxon should display a wait cursor when making a request
false - jaxon should not show a wait cursor during a request
*/
jaxon.config.setDefault('waitCursor', false);

/*
Boolean: statusMessages

true - jaxon should update the status bar during a request
false - jaxon should not display the status of the request
*/
jaxon.config.setDefault('statusMessages', false);

/*
Object: baseDocument

The base document that will be used throughout the code for
locating elements by ID.
*/
jaxon.config.setDefault('baseDocument', document);

/*
String: requestURI

The URI that requests will be sent to.
*/
jaxon.config.setDefault('requestURI', jaxon.config.baseDocument.URL);

/*
String: defaultMode

The request mode.

'asynchronous' - The request will immediately return, the
response will be processed when (and if) it is received.

'synchronous' - The request will block, waiting for the
response.  This option allows the server to return
a value directly to the caller.
*/
jaxon.config.setDefault('defaultMode', 'asynchronous');

/*
String: defaultHttpVersion

The Hyper Text Transport Protocol version designated in the
header of the request.
*/
jaxon.config.setDefault('defaultHttpVersion', 'HTTP/1.1');

/*
String: defaultContentType

The content type designated in the header of the request.
*/
jaxon.config.setDefault('defaultContentType', 'application/x-www-form-urlencoded');

/*
Integer: defaultResponseDelayTime

The delay time, in milliseconds, associated with the
<jaxon.callback.onRequestDelay> event.
*/
jaxon.config.setDefault('defaultResponseDelayTime', 1000);

/*
Integer: defaultExpirationTime

The amount of time to wait, in milliseconds, before a request
is considered expired.  This is used to trigger the
<jaxon.callback.onExpiration event.
*/
jaxon.config.setDefault('defaultExpirationTime', 10000);

/*
String: defaultMethod

The method used to send requests to the server.

'POST' - Generate a form POST request
'GET' - Generate a GET request; parameters are appended
to the <jaxon.config.requestURI> to form a URL.
*/
jaxon.config.setDefault('defaultMethod', 'POST'); // W3C: Method is case sensitive

/*
Integer: defaultRetry

The number of times a request should be retried
if it expires.
*/
jaxon.config.setDefault('defaultRetry', 5);

/*
Object: defaultReturnValue

The value returned by <jaxon.request> when in asynchronous
mode, or when a syncrhonous call does not specify the
return value.
*/
jaxon.config.setDefault('defaultReturnValue', false);

/*
Integer: maxObjectDepth

The maximum depth of recursion allowed when serializing
objects to be sent to the server in a request.
*/
jaxon.config.setDefault('maxObjectDepth', 20);

/*
Integer: maxObjectSize

The maximum number of members allowed when serializing
objects to be sent to the server in a request.
*/
jaxon.config.setDefault('maxObjectSize', 2000);

jaxon.config.setDefault('responseQueueSize', 1000);

/*
Class: jaxon.config.status

Provides support for updating the browser's status bar during
the request process.  By splitting the status bar functionality
into an object, the jaxon developer has the opportunity to
customize the status bar messages prior to sending jaxon requests.
*/
jaxon.config.status = {
    /*
        Function: update

        Constructs and returns a set of event handlers that will be
        called by the jaxon framework to set the status bar messages.
    */
    update: function() {
        return {
            onRequest: function() {
                window.status = 'Sending Request...';
            },
            onWaiting: function() {
                window.status = 'Waiting for Response...';
            },
            onProcessing: function() {
                window.status = 'Processing...';
            },
            onComplete: function() {
                window.status = 'Done.';
            }
        }
    },
    /*
        Function: dontUpdate

        Constructs and returns a set of event handlers that will be
        called by the jaxon framework where status bar updates
        would normally occur.
    */
    dontUpdate: function() {
        return {
            onRequest: function() {},
            onWaiting: function() {},
            onProcessing: function() {},
            onComplete: function() {}
        }
    }
};

/*
Class: jaxon.config.cursor

Provides the base functionality for updating the browser's cursor
during requests.  By splitting this functionalityh into an object
of it's own, jaxon developers can now customize the functionality
prior to submitting requests.
*/
jaxon.config.cursor = {
    /*
        Function: update

        Constructs and returns a set of event handlers that will be
        called by the jaxon framework to effect the status of the
        cursor during requests.
    */
    update: function() {
        return {
            onWaiting: function() {
                if (jaxon.config.baseDocument.body)
                    jaxon.config.baseDocument.body.style.cursor = 'wait';
            },
            onComplete: function() {
                jaxon.config.baseDocument.body.style.cursor = 'auto';
            }
        }
    },
    /*
        Function: dontUpdate

        Constructs and returns a set of event handlers that will
        be called by the jaxon framework where cursor status changes
        would typically be made during the handling of requests.
    */
    dontUpdate: function() {
        return {
            onWaiting: function() {},
            onComplete: function() {}
        }
    }
};

jaxon.tools.ajax = {
    /*
    Function: jaxon.tools.ajax.createRequest

    Construct an XMLHttpRequest object dependent on the capabilities of the browser.

    Returns:
    object - Javascript XHR object.
    */
    createRequest: function() {
        if ('undefined' != typeof XMLHttpRequest) {
            jaxon.tools.ajax.createRequest = function() {
                return new XMLHttpRequest();
            }
        } else if ('undefined' != typeof ActiveXObject) {
            jaxon.tools.ajax.createRequest = function() {
                try {
                    return new ActiveXObject('Msxml2.XMLHTTP.4.0');
                } catch (e) {
                    jaxon.tools.ajax.createRequest = function() {
                        try {
                            return new ActiveXObject('Msxml2.XMLHTTP');
                        } catch (e2) {
                            jaxon.tools.ajax.createRequest = function() {
                                return new ActiveXObject('Microsoft.XMLHTTP');
                            }
                            return jaxon.tools.ajax.createRequest();
                        }
                    }
                    return jaxon.tools.ajax.createRequest();
                }
            }
        } else if (window.createRequest) {
            jaxon.tools.ajax.createRequest = function() {
                return window.createRequest();
            };
        } else {
            jaxon.tools.ajax.createRequest = function() {
                throw { code: 10002 };
            };
        }

        // this would seem to cause an infinite loop, however, the function should
        // be reassigned by now and therefore, it will not loop.
        return jaxon.tools.ajax.createRequest();
    },

    /*
    Function: jaxon.tools.ajax.processFragment

    Parse the JSON response into a series of commands.

    Parameters:
    oRequest - (object):  The request context object.
    */
    processFragment: function(nodes, seq, oRet, oRequest) {
        var xx = jaxon;
        var xt = xx.tools;
        for (nodeName in nodes) {
            if ('jxnobj' == nodeName) {
                for (a in nodes[nodeName]) {
                    /*
                    prevents from using not numbered indexes of 'jxnobj'
                    nodes[nodeName][a]= "0" is an valid jaxon response stack item
                    nodes[nodeName][a]= "pop" is an method from somewhere but not from jxnobj
                    */
                    if (parseInt(a) != a) continue;

                    var obj = nodes[nodeName][a];
                    obj.fullName = '*unknown*';
                    obj.sequence = seq;
                    obj.request = oRequest;
                    obj.context = oRequest.context;
                    xt.queue.push(xx.response, obj);
                    ++seq;
                }
            } else if ('jxnrv' == nodeName) {
                oRet = nodes[nodeName];
            } else if ('debugmsg' == nodeName) {
                txt = nodes[nodeName];
            } else
                throw { code: 10004, data: obj.fullName }
        }
        return oRet;
    }
};

jaxon.tools.array = {
    /*
    Function jaxon.tools.array.is_in

    Looks for a value within the specified array and, if found, returns true; otherwise it returns false.

    Parameters:
        array - (object): The array to be searched.
        valueToCheck - (object): The value to search for.

    Returns:
        true : The value is one of the values contained in the array.
        false : The value was not found in the specified array.
    */
    is_in: function(array, valueToCheck) {
        var i = 0;
        var l = array.length;
        while (i < l) {
            if (array[i] == valueToCheck)
                return true;
            ++i;
        }
        return false;
    }
};

jaxon.tools.dom = {
    /*
    Function: jaxon.tools.dom.$

    Shorthand for finding a uniquely named element within the document.

    Parameters:
    sId - (string):
        The unique name of the element (specified by the ID attribute), not to be confused
        with the name attribute on form elements.

    Returns:
    object - The element found or null.

    Note:
        This function uses the <jaxon.config.baseDocument> which allows <jaxon> to operate on the
        main window document as well as documents from contained iframes and child windows.

    See also:
        <jaxon.$> and <jxn.$>
    */
    $: function(sId) {
        if (!sId)
            return null;
        //sId not an string so return it maybe its an object.
        if (typeof sId != 'string')
            return sId;

        var oDoc = jaxon.config.baseDocument;

        var obj = oDoc.getElementById(sId);
        if (obj)
            return obj;

        if (oDoc.all)
            return oDoc.all[sId];

        return obj;
    },

    /*
    Function: jaxon.tools.dom.getBrowserHTML

    Insert the specified string of HTML into the document, then extract it.
    This gives the browser the ability to validate the code and to apply any transformations it deems appropriate.

    Parameters:
    sValue - (string):
        A block of html code or text to be inserted into the browser's document.

    Returns:
    The (potentially modified) html code or text.
    */
    getBrowserHTML: function(sValue) {
        var oDoc = jaxon.config.baseDocument;
        if (!oDoc.body)
            return '';

        var elWorkspace = jaxon.$('jaxon_temp_workspace');
        if (!elWorkspace) {
            elWorkspace = oDoc.createElement('div');
            elWorkspace.setAttribute('id', 'jaxon_temp_workspace');
            elWorkspace.style.display = 'none';
            elWorkspace.style.visibility = 'hidden';
            oDoc.body.appendChild(elWorkspace);
        }
        elWorkspace.innerHTML = sValue;
        var browserHTML = elWorkspace.innerHTML;
        elWorkspace.innerHTML = '';

        return browserHTML;
    },

    /*
    Function: jaxon.tools.dom.willChange

    Tests to see if the specified data is the same as the current value of the element's attribute.

    Parameters:
    element - (string or object):
        The element or it's unique name (specified by the ID attribute)
    attribute - (string):
        The name of the attribute.
    newData - (string):
        The value to be compared with the current value of the specified element.

    Returns:
    true - The specified value differs from the current attribute value.
    false - The specified value is the same as the current value.
    */
    willChange: function(element, attribute, newData) {
        if ('string' == typeof element)
            element = jaxon.$(element);
        if (element) {
            var oldData;
            eval('oldData=element.' + attribute);
            return (newData != oldData);
        }
        return false;
    },

    /*
    Function: jaxon.tools.dom.findFunction

    Find a function using its name as a string.

    Parameters:
    sFuncName - (string): The name of the function to find.

    Returns:
    Functiion - The function with the given name.
    */
    findFunction: function (sFuncName) {
        var context = window;
        var namespaces = sFuncName.split(".");
        for(var i = 0; i < namespaces.length && context != undefined; i++) {
            context = context[namespaces[i]];
        }
        return context;
    }
};

jaxon.tools.form = {
    /*
    Function: jaxon.tools.form.getValues

    Build an associative array of form elements and their values from the specified form.

    Parameters:
    element - (string): The unique name (id) of the form to be processed.
    disabled - (boolean, optional): Include form elements which are currently disabled.
    prefix - (string, optional): A prefix used for selecting form elements.

    Returns:
    An associative array of form element id and value.
    */
    getValues: function(parent) {
        var submitDisabledElements = false;
        if (arguments.length > 1 && arguments[1] == true)
            submitDisabledElements = true;

        var prefix = '';
        if (arguments.length > 2)
            prefix = arguments[2];

        if ('string' == typeof parent)
            parent = jaxon.$(parent);

        var aFormValues = {};

        //        JW: Removing these tests so that form values can be retrieved from a specified
        //        container element like a DIV, regardless of whether they exist in a form or not.
        //
        //        if (parent.tagName)
        //            if ('FORM' == parent.tagName.toUpperCase())
        if (parent && parent.childNodes)
            jaxon.tools.form._getValues(aFormValues, parent.childNodes, submitDisabledElements, prefix);

        return aFormValues;
    },

    /*
    Function: jaxon.tools.form._getValues

    Used internally by <jaxon.tools.form.getValues> to recursively get the value
    of form elements.  This function will extract all form element values
    regardless of the depth of the element within the form.
    */
    _getValues: function(aFormValues, children, submitDisabledElements, prefix) {
        var iLen = children.length;
        for (var i = 0; i < iLen; ++i) {
            var child = children[i];
            if (('undefined' != typeof child.childNodes) && (child.type != 'select-one') && (child.type != 'select-multiple'))
                jaxon.tools.form._getValues(aFormValues, child.childNodes, submitDisabledElements, prefix);
            jaxon.tools.form._getValue(aFormValues, child, submitDisabledElements, prefix);
        }
    },

    /*
    Function: jaxon.tools.form._getValue

    Used internally by <jaxon.tools.form._getValues> to extract a single form value.
    This will detect the type of element (radio, checkbox, multi-select) and add it's value(s) to the form values array.

    Modified version for multidimensional arrays
    */
    _getValue: function(aFormValues, child, submitDisabledElements, prefix) {
        if (!child.name)
            return;

        if ('PARAM' == child.tagName) return;

        if (child.disabled)
            if (true == child.disabled)
                if (false == submitDisabledElements)
                    return;

        if (prefix != child.name.substring(0, prefix.length))
            return;

        if (child.type)
        {
            if (child.type == 'radio' || child.type == 'checkbox')
                if (false == child.checked)
                    return;
            if (child.type == 'file')
                return;
        }

        var name = child.name;

        var values = [];

        if ('select-multiple' == child.type) {
            var jLen = child.length;
            for (var j = 0; j < jLen; ++j) {
                var option = child.options[j];
                if (true == option.selected)
                    values.push(option.value);
            }
        } else {
            values = child.value;
        }

        var keyBegin = name.indexOf('[');
        /* exists name/object before the Bracket?*/
        if (0 <= keyBegin) {
            var n = name;
            var k = n.substr(0, n.indexOf('['));
            var a = n.substr(n.indexOf('['));
            if (typeof aFormValues[k] == 'undefined')
                aFormValues[k] = {};
            var p = aFormValues; // pointer reset
            while (a.length != 0) {
                var sa = a.substr(0, a.indexOf(']') + 1);

                var lk = k; //save last key
                var lp = p; //save last pointer

                a = a.substr(a.indexOf(']') + 1);
                p = p[k];
                k = sa.substr(1, sa.length - 2);
                if (k == '') {
                    if ('select-multiple' == child.type) {
                        k = lk; //restore last key
                        p = lp;
                    } else {
                        k = p.length;
                    }
                }
                if (typeof k == 'undefined') {
                    /*check against the global aFormValues Stack wich is the next(last) usable index */
                    k = 0;
                    for (var i in lp[lk]) k++;
                }
                if (typeof p[k] == 'undefined') {

                    p[k] = {};
                }
            }
            p[k] = values;
        } else {
            aFormValues[name] = values;
        }
    }
};


jaxon.tools.queue = {
    /*
    Function: create

    Construct and return a new queue object.

    Parameters:
    size - (integer):
        The number of entries the queue will be able to hold.
    */
    create: function(size) {
        return {
            start: 0,
            size: size,
            end: 0,
            commands: [],
            timeout: null
        }
    },

    /*
    Function: jaxon.tools.queue.retry

    Maintains a retry counter for the given object.

    Parameters:
    obj - (object):
        The object to track the retry count for.
    count - (integer):
        The number of times the operation should be attempted before a failure is indicated.

    Returns:
    true - The object has not exhausted all the retries.
    false - The object has exhausted the retry count specified.
    */
    retry: function(obj, count) {
        var retries = obj.retries;
        if (retries) {
            --retries;
            if (1 > retries)
                return false;
        } else retries = count;
        obj.retries = retries;
        return true;
    },

    /*
    Function: jaxon.tools.queue.rewind

    Rewind the buffer head pointer, effectively reinserting the last retrieved object into the buffer.

    Parameters:
    theQ - (object):
        The queue to be rewound.
    */
    rewind: function(theQ) {
        if (0 < theQ.start)
            --theQ.start;
        else
            theQ.start = theQ.size;
    },

    /*
    Function: jaxon.tools.queue.push

    Push a new object into the tail of the buffer maintained by the specified queue object.

    Parameters:
    theQ - (object):
        The queue in which you would like the object stored.
    obj - (object):
        The object you would like stored in the queue.
    */
    push: function(theQ, obj) {
        var next = theQ.end + 1;
        if (next > theQ.size)
            next = 0;
        if (next != theQ.start) {
            theQ.commands[theQ.end] = obj;
            theQ.end = next;
        } else
            throw { code: 10003 }
    },

    /*
    Function: jaxon.tools.queue.pushFront

    Push a new object into the head of the buffer maintained by the specified queue object.
    This effectively pushes an object to the front of the queue... it will be processed first.

    Parameters:
    theQ - (object):
        The queue in which you would like the object stored.
    obj - (object):
        The object you would like stored in the queue.
    */
    pushFront: function(theQ, obj) {
        jaxon.tools.queue.rewind(theQ);
        theQ.commands[theQ.start] = obj;
    },

    /*
    Function: jaxon.tools.queue.pop

    Attempt to pop an object off the head of the queue.

    Parameters:
    theQ - (object):
        The queue object you would like to modify.

    Returns:
    object - The object that was at the head of the queue or
        null if the queue was empty.
    */
    pop: function(theQ) {
        var next = theQ.start;
        if (next == theQ.end)
            return null;
        next++;
        if (next > theQ.size)
            next = 0;
        var obj = theQ.commands[theQ.start];
        delete theQ.commands[theQ.start];
        theQ.start = next;
        return obj;
    }
};

jaxon.tools.string = {
    /*
    Function: jaxon.tools.string.doubleQuotes

    Replace all occurances of the single quote character with a double quote character.

    Parameters:
    haystack - The source string to be scanned.

    Returns:  false on error
    string - A new string with the modifications applied.
    */
    doubleQuotes: function(haystack) {
        if (typeof haystack == 'undefined') return false;
        return haystack.replace(new RegExp("'", 'g'), '"');
    },

    /*
    Function: jaxon.tools.string.singleQuotes

    Replace all occurances of the double quote character with a single quote character.

    haystack - The source string to be scanned.

    Returns:
    string - A new string with the modification applied.
    */
    singleQuotes: function(haystack) {
        if (typeof haystack == 'undefined') return false;
        return haystack.replace(new RegExp('"', 'g'), "'");
    },

    /*
    Function: jaxon.tools.string.stripOnPrefix

    Detect, and if found, remove the prefix 'on' from the specified string.
    This is used while working with event handlers.

    Parameters:
    sEventName - (string): The string to be modified.

    Returns:
    string - The modified string.
    */
    stripOnPrefix: function(sEventName) {
        sEventName = sEventName.toLowerCase();
        if (0 == sEventName.indexOf('on'))
            sEventName = sEventName.replace(/on/, '');

        return sEventName;
    },

    /*
    Function: jaxon.tools.string.addOnPrefix

    Detect, and add if not found, the prefix 'on' from the specified string.
    This is used while working with event handlers.

    Parameters:
    sEventName - (string): The string to be modified.

    Returns:
    string - The modified string.
    */
    addOnPrefix: function(sEventName) {
        sEventName = sEventName.toLowerCase();
        if (0 != sEventName.indexOf('on'))
            sEventName = 'on' + sEventName;

        return sEventName;
    }
};

/**
 * String functions for Jaxon
 * See http://javascript.crockford.com/remedial.html for more explanation
 */

/**
 * Substitute variables in the string
 *
 * @return string
 */
if (!String.prototype.supplant) {
    String.prototype.supplant = function(o) {
        return this.replace(
            /\{([^{}]*)\}/g,
            function(a, b) {
                var r = o[b];
                return typeof r === 'string' || typeof r === 'number' ? r : a;
            }
        );
    };
}

jaxon.tools.upload = {
    /*
    Function: jaxon.tools.upload.createIframe

    Create an iframe for file upload.
    */
    createIframe: function(oRequest) {
        var target = 'jaxon_upload_' + oRequest.upload.id;
        // Delete the iframe, in the case it already exists
        jaxon.cmd.node.remove(target);
        // Create the iframe.
        jaxon.cmd.node.insert(oRequest.upload.form, 'iframe', target);
        oRequest.upload.iframe = jaxon.tools.dom.$(target);
        oRequest.upload.iframe.name = target;
        oRequest.upload.iframe.style.display = 'none';
        // Set the form attributes
        oRequest.upload.form.method = 'POST';
        oRequest.upload.form.enctype = 'multipart/form-data';
        oRequest.upload.form.action = jaxon.config.requestURI;
        oRequest.upload.form.target = target;
        return true;
    },

    /*
    Function: jaxon.tools.upload._initialize

    Check upload data and initialize the request.
    */
    _initialize: function(oRequest) {
        if (oRequest.upload == false) {
            return false;
        }
        oRequest.upload = { id: oRequest.upload, input: null, form: null, ajax: false/*!!window.FormData*/ };

        var input = jaxon.tools.dom.$(oRequest.upload.id);
        if (input == null) {
            console.log('Unable to find input field for file upload with id ' + oRequest.upload.id);
            return false;
        }
        if (input.type != 'file') {
            console.log('The upload input field with id ' + oRequest.upload.id + ' is not of type file');
            return false;
        }
        if (input.files.length == 0) {
            console.log('There is no file selected for upload in input field with id ' + oRequest.upload.id);
            return false;
        }
        if (typeof input.name == 'undefined') {
            console.log('The upload input field with id ' + oRequest.upload.id + ' has no name attribute');
            return false;
        }
        oRequest.upload.input = input;
        oRequest.upload.form = input.form;
        // Having the input field is enough for upload with FormData (Ajax).
        if (oRequest.upload.ajax != false)
            return true;
        // For upload with iframe, we need to get the form too.
        if (!input.form) {
            // Find the input form
            var form = input;
            while (form != null && form.nodeName != 'FORM')
                form = form.parentNode;
            if (form == null) {
                console.log('The upload input field with id ' + oRequest.upload.id + ' is not in a form');
                return false;
            }
            oRequest.upload.form = form;
        }
        // If FormData feature is not available, files are uploaded with iframes.
        jaxon.tools.upload.createIframe(oRequest);

        return true;
    },

    /*
    Function: jaxon.tools.upload.initialize

    Check upload data and initialize the request.

    Parameters:

    oRequest - A request object, created initially by a call to <jaxon.ajax.request.initialize>
    */
    initialize: function(oRequest) {
        jaxon.tools.upload._initialize(oRequest);

        // The content type is not set when uploading a file with FormData.
        // It will be set by the browser.
        if (oRequest.upload == false || !oRequest.upload.ajax || !oRequest.upload.input) {
            oRequest.append('postHeaders', {
                'content-type': oRequest.contentType
            });
        }
    }
};


jaxon.cmd.event = {
    /*
    Function: jaxon.cmd.event.setEvent

    Set an event handler.

    Parameters:

    command - (object): Response command object.
    - id: Element ID
    - prop: Event
    - data: Code

    Returns:

    true - The operation completed successfully.
    */
    setEvent: function(command) {
        command.fullName = 'setEvent';
        var element = command.id;
        var sEvent = command.prop;
        var code = command.data;
        //force to get the element
        if ('string' == typeof element)
            element = jaxon.$(element);
        sEvent = jaxon.tools.string.addOnPrefix(sEvent);
        code = jaxon.tools.string.doubleQuotes(code);
        eval('element.' + sEvent + ' = function(e) { ' + code + '; }');
        return true;
    },

    /*
    Function: jaxon.cmd.event.addHandler

    Add an event handler to the specified element.

    Parameters:

    command - (object): Response command object.
    - id: The id of, or the element itself
    - prop: The name of the event.
    - data: The name of the function to be called

    Returns:

    true - The operation completed successfully.
    */
    addHandler: function(command) {
        if (window.addEventListener) {
            jaxon.cmd.event.addHandler = function(command) {
                command.fullName = 'addHandler';
                var element = command.id;
                var sEvent = command.prop;
                var sFuncName = command.data;
                if ('string' == typeof element)
                    element = jaxon.$(element);
                sEvent = jaxon.tools.string.stripOnPrefix(sEvent);
                eval('element.addEventListener("' + sEvent + '", ' + sFuncName + ', false);');
                return true;
            }
        } else {
            jaxon.cmd.event.addHandler = function(command) {
                command.fullName = 'addHandler';
                var element = command.id;
                var sEvent = command.prop;
                var sFuncName = command.data;
                if ('string' == typeof element)
                    element = jaxon.$(element);
                sEvent = jaxon.tools.string.addOnPrefix(sEvent);
                eval('element.attachEvent("' + sEvent + '", ' + sFuncName + ', false);');
                return true;
            }
        }
        return jaxon.cmd.event.addHandler(command);
    },

    /*
    Function: jaxon.cmd.event.removeHandler

    Remove an event handler from an element.

    Parameters:

    command - (object): Response command object.
    - id: The id of, or the element itself
    - prop: The name of the event.
    - data: The name of the function to be removed

    Returns:

    true - The operation completed successfully.
    */
    removeHandler: function(command) {
        if (window.removeEventListener) {
            jaxon.cmd.event.removeHandler = function(command) {
                command.fullName = 'removeHandler';
                var element = command.id;
                var sEvent = command.prop;
                var sFuncName = command.data;
                if ('string' == typeof element)
                    element = jaxon.$(element);
                sEvent = jaxon.tools.string.stripOnPrefix(sEvent);
                eval('element.removeEventListener("' + sEvent + '", ' + sFuncName + ', false);');
                return true;
            }
        } else {
            jaxon.cmd.event.removeHandler = function(command) {
                command.fullName = 'removeHandler';
                var element = command.id;
                var sEvent = command.prop;
                var sFuncName = command.data;
                if ('string' == typeof element)
                    element = jaxon.$(element);
                sEvent = jaxon.tools.string.addOnPrefix(sEvent);
                eval('element.detachEvent("' + sEvent + '", ' + sFuncName + ', false);');
                return true;
            }
        }
        return jaxon.cmd.event.removeHandler(command);
    }
};

jaxon.cmd.form = {
    /*
    Function: jaxon.cmd.form.getInput

    Create and return a form input element with the specified parameters.

    Parameters:

    type - (string):  The type of input element desired.
    name - (string):  The value to be assigned to the name attribute.
    id - (string):  The value to be assigned to the id attribute.

    Returns:

    object - The new input element.
    */
    getInput: function(type, name, id) {
        if ('undefined' == typeof window.addEventListener) {
            jaxon.cmd.form.getInput = function(type, name, id) {
                return jaxon.config.baseDocument.createElement('<input type="' + type + '" name="' + name + '" id="' + id + '">');
            }
        } else {
            jaxon.cmd.form.getInput = function(type, name, id) {
                var oDoc = jaxon.config.baseDocument;
                var Obj = oDoc.createElement('input');
                Obj.setAttribute('type', type);
                Obj.setAttribute('name', name);
                Obj.setAttribute('id', id);
                return Obj;
            }
        }
        return jaxon.cmd.form.getInput(type, name, id);
    },

    /*
    Function: jaxon.cmd.form.createInput

    Create a new input element under the specified parent.

    Parameters:

    objParent - (string or object):  The name of, or the element itself
        that will be used as the reference for the insertion.
    sType - (string):  The value to be assigned to the type attribute.
    sName - (string):  The value to be assigned to the name attribute.
    sId - (string):  The value to be assigned to the id attribute.

    Returns:

    true - The operation completed successfully.
    */
    createInput: function(command) {
        command.fullName = 'createInput';
        var objParent = command.id;

        var sType = command.type;
        var sName = command.data;
        var sId = command.prop;
        if ('string' == typeof objParent)
            objParent = jaxon.$(objParent);
        var target = jaxon.cmd.form.getInput(sType, sName, sId);
        if (objParent && target) {
            objParent.appendChild(target);
        }
        return true;
    },

    /*
    Function: jaxon.cmd.form.insertInput

    Insert a new input element before the specified element.

    Parameters:

    objSibling - (string or object):  The name of, or the element itself
        that will be used as the reference for the insertion.
    sType - (string):  The value to be assigned to the type attribute.
    sName - (string):  The value to be assigned to the name attribute.
    sId - (string):  The value to be assigned to the id attribute.

    Returns:

    true - The operation completed successfully.
    */
    insertInput: function(command) {
        command.fullName = 'insertInput';
        var objSibling = command.id;
        var sType = command.type;
        var sName = command.data;
        var sId = command.prop;
        if ('string' == typeof objSibling)
            objSibling = jaxon.$(objSibling);
        var target = jaxon.cmd.form.getInput(sType, sName, sId);
        if (target && objSibling && objSibling.parentNode)
            objSibling.parentNode.insertBefore(target, objSibling);
        return true;
    },

    /*
    Function: jaxon.cmd.form.insertInputAfter

    Insert a new input element after the specified element.

    Parameters:

    objSibling - (string or object):  The name of, or the element itself
        that will be used as the reference for the insertion.
    sType - (string):  The value to be assigned to the type attribute.
    sName - (string):  The value to be assigned to the name attribute.
    sId - (string):  The value to be assigned to the id attribute.

    Returns:

    true - The operation completed successfully.
    */
    insertInputAfter: function(command) {
        command.fullName = 'insertInputAfter';
        var objSibling = command.id;
        var sType = command.type;
        var sName = command.data;
        var sId = command.prop;
        if ('string' == typeof objSibling)
            objSibling = jaxon.$(objSibling);
        var target = jaxon.cmd.form.getInput(sType, sName, sId);
        if (target && objSibling && objSibling.parentNode)
            objSibling.parentNode.insertBefore(target, objSibling.nextSibling);
        return true;
    }
};

jaxon.cmd.node = {
    /*
    Function: jaxon.cmd.node.assign

    Assign an element's attribute to the specified value.

    Parameters:

    element - (object):  The HTML element to effect.
    property - (string):  The name of the attribute to set.
    data - (string):  The new value to be applied.

    Returns:

    true - The operation completed successfully.
    */
    assign: function(element, property, data) {
        if ('string' == typeof element)
            element = jaxon.$(element);

        switch (property) {
            case 'innerHTML':
                element.innerHTML = data;
                break;
            case 'outerHTML':
                if ('undefined' == typeof element.outerHTML) {
                    var r = jaxon.config.baseDocument.createRange();
                    r.setStartBefore(element);
                    var df = r.createContextualFragment(data);
                    element.parentNode.replaceChild(df, element);
                } else element.outerHTML = data;
                break;
            default:
                if (jaxon.tools.dom.willChange(element, property, data))
                    eval('element.' + property + ' = data;');
                break;
        }
        return true;
    },

    /*
    Function: jaxon.cmd.node.append

    Append the specified value to an element's attribute.

    Parameters:

    element - (object):  The HTML element to effect.
    property - (string):  The name of the attribute to append to.
    data - (string):  The new value to be appended.

    Returns:

    true - The operation completed successfully.
    */
    append: function(element, property, data) {
        if ('string' == typeof element)
            element = jaxon.$(element);

        // Check if the insertAdjacentHTML() function is available
        if((window.insertAdjacentHTML) || (element.insertAdjacentHTML))
            if(property == 'innerHTML')
                element.insertAdjacentHTML('beforeend', data);
            else if(property == 'outerHTML')
                element.insertAdjacentHTML('afterend', data);
            else
                element[property] += data;
        else
            eval('element.' + property + ' += data;');
        return true;
    },

    /*
    Function: jaxon.cmd.node.prepend

    Prepend the specified value to an element's attribute.

    Parameters:

    element - (object):  The HTML element to effect.
    property - (string):  The name of the attribute.
    data - (string):  The new value to be prepended.

    Returns:

    true - The operation completed successfully.
    */
    prepend: function(element, property, data) {
        if ('string' == typeof element)
            element = jaxon.$(element);

        eval('element.' + property + ' = data + element.' + property);
        return true;
    },

    /*
    Function: jaxon.cmd.node.replace

    Search and replace the specified text.

    Parameters:

    element - (string or object):  The name of, or the element itself which is to be modified.
    sAttribute - (string):  The name of the attribute to be set.
    aData - (array):  The search text and replacement text.

    Returns:

    true - The operation completed successfully.
    */
    replace: function(element, sAttribute, aData) {
        var sSearch = aData['s'];
        var sReplace = aData['r'];

        if (sAttribute == 'innerHTML')
            sSearch = jaxon.tools.dom.getBrowserHTML(sSearch);

        if ('string' == typeof element)
            element = jaxon.$(element);

        eval('var txt = element.' + sAttribute);

        var bFunction = false;
        if ('function' == typeof txt) {
            txt = txt.join('');
            bFunction = true;
        }

        var start = txt.indexOf(sSearch);
        if (start > -1) {
            var newTxt = [];
            while (start > -1) {
                var end = start + sSearch.length;
                newTxt.push(txt.substr(0, start));
                newTxt.push(sReplace);
                txt = txt.substr(end, txt.length - end);
                start = txt.indexOf(sSearch);
            }
            newTxt.push(txt);
            newTxt = newTxt.join('');

            if (bFunction) {
                eval('element.' + sAttribute + '=newTxt;');
            } else if (jaxon.tools.dom.willChange(element, sAttribute, newTxt)) {
                eval('element.' + sAttribute + '=newTxt;');
            }
        }
        return true;
    },

    /*
    Function: jaxon.cmd.node.remove

    Delete an element.

    Parameters:

    element - (string or object):  The name of, or the element itself which will be deleted.

    Returns:

    true - The operation completed successfully.
    */
    remove: function(element) {
        if ('string' == typeof element)
            element = jaxon.$(element);

        if (element && element.parentNode && element.parentNode.removeChild)
            element.parentNode.removeChild(element);

        return true;
    },

    /*
    Function: jaxon.cmd.node.create

    Create a new element and append it to the specified parent element.

    Parameters:

    objParent - (string or object):  The name of, or the element itself
        which will contain the new element.
    sTag - (string):  The tag name for the new element.
    sId - (string):  The value to be assigned to the id attribute of the new element.

    Returns:

    true - The operation completed successfully.
    */
    create: function(objParent, sTag, sId) {
        if ('string' == typeof objParent)
            objParent = jaxon.$(objParent);
        var target = jaxon.config.baseDocument.createElement(sTag);
        target.setAttribute('id', sId);
        if (objParent)
            objParent.appendChild(target);
        return true;
    },

    /*
    Function: jaxon.cmd.node.insert

    Insert a new element before the specified element.

    Parameters:

    objSibling - (string or object):  The name of, or the element itself
        that will be used as the reference point for insertion.
    sTag - (string):  The tag name for the new element.
    sId - (string):  The value that will be assigned to the new element's id attribute.

    Returns:

    true - The operation completed successfully.
    */
    insert: function(objSibling, sTag, sId) {
        if ('string' == typeof objSibling)
            objSibling = jaxon.$(objSibling);
        var target = jaxon.config.baseDocument.createElement(sTag);
        target.setAttribute('id', sId);
        objSibling.parentNode.insertBefore(target, objSibling);
        return true;
    },

    /*
    Function: jaxon.cmd.node.insertAfter

    Insert a new element after the specified element.

    Parameters:

    objSibling - (string or object):  The name of, or the element itself
        that will be used as the reference point for insertion.
    sTag - (string):  The tag name for the new element.
    sId - (string):  The value that will be assigned to the new element's id attribute.

    Returns:

    true - The operation completed successfully.
    */
    insertAfter: function(objSibling, sTag, sId) {
        if ('string' == typeof objSibling)
            objSibling = jaxon.$(objSibling);
        var target = jaxon.config.baseDocument.createElement(sTag);
        target.setAttribute('id', sId);
        objSibling.parentNode.insertBefore(target, objSibling.nextSibling);
        return true;
    },

    /*
    Function: jaxon.cmd.node.contextAssign

    Assign a value to a named member of the current script context object.

    Parameters:

    args - (object):  The response command object which will contain the
        following:

        - args.prop: (string):  The name of the member to assign.
        - args.data: (string or object):  The value to assign to the member.
        - args.context: (object):  The current script context object which
            is accessable via the 'this' keyword.

    Returns:

    true - The operation completed successfully.
    */
    contextAssign: function(args) {
        args.fullName = 'context assign';

        var code = [];
        code.push('this.');
        code.push(args.prop);
        code.push(' = data;');
        code = code.join('');
        args.context.jaxonDelegateCall = function(data) {
            eval(code);
        }
        args.context.jaxonDelegateCall(args.data);
        return true;
    },

    /*
    Function: jaxon.cmd.node.contextAppend

    Appends a value to a named member of the current script context object.

    Parameters:

    args - (object):  The response command object which will contain the
        following:

        - args.prop: (string):  The name of the member to append to.
        - args.data: (string or object):  The value to append to the member.
        - args.context: (object):  The current script context object which
            is accessable via the 'this' keyword.

    Returns:

    true - The operation completed successfully.
    */
    contextAppend: function(args) {
        args.fullName = 'context append';

        var code = [];
        code.push('this.');
        code.push(args.prop);
        code.push(' += data;');
        code = code.join('');
        args.context.jaxonDelegateCall = function(data) {
            eval(code);
        }
        args.context.jaxonDelegateCall(args.data);
        return true;
    },

    /*
    Function: jaxon.cmd.node.contextPrepend

    Prepend a value to a named member of the current script context object.

    Parameters:

    args - (object):  The response command object which will contain the
        following:

        - args.prop: (string):  The name of the member to prepend to.
        - args.data: (string or object):  The value to prepend to the member.
        - args.context: (object):  The current script context object which
            is accessable via the 'this' keyword.

    Returns:

    true - The operation completed successfully.
    */
    contextPrepend: function(args) {
        args.fullName = 'context prepend';

        var code = [];
        code.push('this.');
        code.push(args.prop);
        code.push(' = data + this.');
        code.push(args.prop);
        code.push(';');
        code = code.join('');
        args.context.jaxonDelegateCall = function(data) {
            eval(code);
        }
        args.context.jaxonDelegateCall(args.data);
        return true;
    }
};

jaxon.cmd.script = {
    /*
    Function: jaxon.cmd.script.includeScriptOnce

    Add a reference to the specified script file if one does not already exist in the HEAD of the current document.

    This will effecitvely cause the script file to be loaded in the browser.

    Parameters:

    fileName - (string):  The URI of the file.

    Returns:

    true - The reference exists or was added.
    */
    includeScriptOnce: function(command) {
        command.fullName = 'includeScriptOnce';
        var fileName = command.data;
        // Check for existing script tag for this file.
        var oDoc = jaxon.config.baseDocument;
        var loadedScripts = oDoc.getElementsByTagName('script');
        var iLen = loadedScripts.length;
        for (var i = 0; i < iLen; ++i) {
            var script = loadedScripts[i];
            if (script.src) {
                if (0 <= script.src.indexOf(fileName))
                    return true;
            }
        }
        return jaxon.cmd.script.includeScript(command);
    },

    /*
    Function: jaxon.cmd.script.includeScript

    Adds a SCRIPT tag referencing the specified file.
    This effectively causes the script to be loaded in the browser.

    Parameters:

    command (object) - Xajax response object

    Returns:

    true - The reference was added.
    */
    includeScript: function(command) {
        command.fullName = 'includeScript';
        var oDoc = jaxon.config.baseDocument;
        var objHead = oDoc.getElementsByTagName('head');
        var objScript = oDoc.createElement('script');
        objScript.src = command.data;
        if ('undefined' == typeof command.type) objScript.type = 'text/javascript';
        else objScript.type = command.type;
        if ('undefined' != typeof command.type) objScript.setAttribute('id', command.elm_id);
        objHead[0].appendChild(objScript);
        return true;
    },

    /*
    Function: jaxon.cmd.script.removeScript

    Locates a SCRIPT tag in the HEAD of the document which references the specified file and removes it.

    Parameters:

    command (object) - Xajax response object

    Returns:

    true - The script was not found or was removed.
    */
    removeScript: function(command) {
        command.fullName = 'removeScript';
        var fileName = command.data;
        var unload = command.unld;
        var oDoc = jaxon.config.baseDocument;
        var loadedScripts = oDoc.getElementsByTagName('script');
        var iLen = loadedScripts.length;
        for (var i = 0; i < iLen; ++i) {
            var script = loadedScripts[i];
            if (script.src) {
                if (0 <= script.src.indexOf(fileName)) {
                    if ('undefined' != typeof unload) {
                        var args = {};
                        args.data = unload;
                        args.context = window;
                        jaxon.cmd.script.execute(args);
                    }
                    var parent = script.parentNode;
                    parent.removeChild(script);
                }
            }
        }
        return true;
    },

    /*
    Function: jaxon.cmd.script.sleep

    Causes the processing of items in the queue to be delayed for the specified amount of time.
    This is an asynchronous operation, therefore, other operations will be given an opportunity
    to execute during this delay.

    Parameters:

    args - (object):  The response command containing the following
        parameters.
        - args.prop: The number of 10ths of a second to sleep.

    Returns:

    true - The sleep operation completed.
    false - The sleep time has not yet expired, continue sleeping.
    */
    sleep: function(command) {
        command.fullName = 'sleep';
        // inject a delay in the queue processing
        // handle retry counter
        if (jaxon.tools.queue.retry(command, command.prop)) {
            jaxon.ajax.response.setWakeup(jaxon.response, 100);
            return false;
        }
        // wake up, continue processing queue
        return true;
    },

    /*
    Function: jaxon.cmd.script.confirmCommands

    Prompt the user with the specified text, if the user responds by clicking cancel, then skip
    the specified number of commands in the response command queue.
    If the user clicks Ok, the command processing resumes normal operation.

    Parameters:

    command (object) - jaxon response object

    Returns:

    true - The operation completed successfully.
    */
    confirmCommands: function(command) {
        command.fullName = 'confirmCommands';
        var msg = command.data;
        var numberOfCommands = command.id;
        if (false == confirm(msg)) {
            while (0 < numberOfCommands) {
                jaxon.tools.queue.pop(jaxon.response);
                --numberOfCommands;
            }
        }
        return true;
    },

    /*
    Function: jaxon.cmd.script.execute

    Execute the specified string of javascript code, using the current script context.

    Parameters:

    args - The response command object containing the following:
        - args.data: (string):  The javascript to be evaluated.
        - args.context: (object):  The javascript object that to be referenced as 'this' in the script.

    Returns:

    unknown - A value set by the script using 'returnValue = '
    true - If the script does not set a returnValue.
    */
    execute: function(args) {
        args.fullName = 'execute Javascript';
        var returnValue = true;
        args.context = args.context ? args.context : {};
        args.context.jaxonDelegateCall = function() {
            eval(args.data);
        };
        args.context.jaxonDelegateCall();
        return returnValue;
    },

    /*
    Function: jaxon.cmd.script.waitFor

    Test for the specified condition, using the current script context;
    if the result is false, sleep for 1/10th of a second and try again.

    Parameters:

    args - The response command object containing the following:

        - args.data: (string):  The javascript to evaluate.
        - args.prop: (integer):  The number of 1/10ths of a second to wait before giving up.
        - args.context: (object):  The current script context object which is accessable in
            the javascript being evaulated via the 'this' keyword.

    Returns:

    false - The condition evaulates to false and the sleep time has not expired.
    true - The condition evaluates to true or the sleep time has expired.
    */
    waitFor: function(args) {
        args.fullName = 'waitFor';

        var bResult = false;
        var cmdToEval = 'bResult = (';
        cmdToEval += args.data;
        cmdToEval += ');';
        try {
            args.context.jaxonDelegateCall = function() {
                eval(cmdToEval);
            }
            args.context.jaxonDelegateCall();
        } catch (e) {}
        if (false == bResult) {
            // inject a delay in the queue processing
            // handle retry counter
            if (jaxon.tools.queue.retry(args, args.prop)) {
                jaxon.ajax.response.setWakeup(jaxon.response, 100);
                return false;
            }
            // give up, continue processing queue
        }
        return true;
    },

    /*
    Function: jaxon.cmd.script.call

    Call a javascript function with a series of parameters using the current script context.

    Parameters:

    args - The response command object containing the following:
        - args.data: (array):  The parameters to pass to the function.
        - args.func: (string):  The name of the function to call.
        - args.context: (object):  The current script context object which is accessable in the
            function name via the 'this keyword.

    Returns:

    true - The call completed successfully.
    */
    call: function(args) {
        args.fullName = 'call js function';

        var parameters = args.data;

        var scr = new Array();
        scr.push(args.func);
        scr.push('(');
        if ('undefined' != typeof parameters) {
            if ('object' == typeof parameters) {
                var iLen = parameters.length;
                if (0 < iLen) {
                    scr.push('parameters[0]');
                    for (var i = 1; i < iLen; ++i)
                        scr.push(', parameters[' + i + ']');
                }
            }
        }
        scr.push(');');
        args.context.jaxonDelegateCall = function() {
            eval(scr.join(''));
        }
        args.context.jaxonDelegateCall();
        return true;
    },

    /*
    Function: jaxon.cmd.script.setFunction

    Constructs the specified function using the specified javascript as the body of the function.

    Parameters:

    args - The response command object which contains the following:

        - args.func: (string):  The name of the function to construct.
        - args.data: (string):  The script that will be the function body.
        - args.context: (object):  The current script context object
            which is accessable in the script name via the 'this' keyword.

    Returns:

    true - The function was constructed successfully.
    */
    setFunction: function(args) {
        args.fullName = 'setFunction';

        var code = new Array();
        code.push(args.func);
        code.push(' = function(');
        if ('object' == typeof args.prop) {
            var separator = '';
            for (var m in args.prop) {
                code.push(separator);
                code.push(args.prop[m]);
                separator = ',';
            }
        } else code.push(args.prop);
        code.push(') { ');
        code.push(args.data);
        code.push(' }');
        args.context.jaxonDelegateCall = function() {
            eval(code.join(''));
        }
        args.context.jaxonDelegateCall();
        return true;
    },

    /*
    Function: jaxon.cmd.script.wrapFunction

    Construct a javascript function which will call the original function with the same name,
    potentially executing code before and after the call to the original function.

    Parameters:

    args - (object):  The response command object which will contain
        the following:

        - args.func: (string):  The name of the function to be wrapped.
        - args.prop: (string):  List of parameters used when calling the function.
        - args.data: (array):  The portions of code to be called before, after
            or even between calls to the original function.
        - args.context: (object):  The current script context object which is
            accessable in the function name and body via the 'this' keyword.

    Returns:

    true - The wrapper function was constructed successfully.
    */
    wrapFunction: function(args) {
        args.fullName = 'wrapFunction';

        var code = new Array();
        code.push(args.func);
        code.push(' = jaxon.cmd.script.makeWrapper(');
        code.push(args.func);
        code.push(', args.prop, args.data, args.type, args.context);');
        args.context.jaxonDelegateCall = function() {
            eval(code.join(''));
        }
        args.context.jaxonDelegateCall();
        return true;
    },

    /*
    Function: jaxon.cmd.script.makeWrapper


    Helper function used in the wrapping of an existing javascript function.

    Parameters:

    origFun - (string):  The name of the original function.
    args - (string):  The list of parameters used when calling the function.
    codeBlocks - (array):  Array of strings of javascript code to be executed
        before, after and perhaps between calls to the original function.
    returnVariable - (string):  The name of the variable used to retain the
        return value from the call to the original function.
    context - (object):  The current script context object which is accessable
        in the function name and body via the 'this' keyword.

    Returns:

    object - The complete wrapper function.
    */
    makeWrapper: function(origFun, args, codeBlocks, returnVariable, context) {
        var originalCall = '';
        if (0 < returnVariable.length) {
            originalCall += returnVariable;
            originalCall += ' = ';
        }
        var originalCall = 'origFun(';
        originalCall += args;
        originalCall += '); ';

        var code = 'wrapper = function(';
        code += args;
        code += ') { ';

        if (0 < returnVariable.length) {
            code += ' var ';
            code += returnVariable;
            code += ' = null;';
        }
        var separator = '';
        var bLen = codeBlocks.length;
        for (var b = 0; b < bLen; ++b) {
            code += separator;
            code += codeBlocks[b];
            separator = originalCall;
        }
        if (0 < returnVariable.length) {
            code += ' return ';
            code += returnVariable;
            code += ';';
        }
        code += ' } ';

        var wrapper = null;
        context.jaxonDelegateCall = function() {
            eval(code);
        }
        context.jaxonDelegateCall();
        return wrapper;
    }
};

jaxon.cmd.style = {
    /*
    Function: jaxon.cmd.style.add

    Add a LINK reference to the specified .css file if it does not already exist in the HEAD of the current document.

    Parameters:

    filename - (string):  The URI of the .css file to reference.
    media - (string):  The media type of the css file (print/screen/handheld,..)

    Returns:

    true - The operation completed successfully.
    */
    add: function(fileName, media) {
        var oDoc = jaxon.config.baseDocument;
        var oHeads = oDoc.getElementsByTagName('head');
        var oHead = oHeads[0];
        var oLinks = oHead.getElementsByTagName('link');

        var found = false;
        var iLen = oLinks.length;
        for (var i = 0; i < iLen && false == found; ++i)
            if (0 <= oLinks[i].href.indexOf(fileName) && oLinks[i].media == media)
                found = true;

        if (false == found) {
            var oCSS = oDoc.createElement('link');
            oCSS.rel = 'stylesheet';
            oCSS.type = 'text/css';
            oCSS.href = fileName;
            oCSS.media = media;
            oHead.appendChild(oCSS);
        }

        return true;
    },

    /*
    Function: jaxon.cmd.style.remove

    Locate and remove a LINK reference from the current document's HEAD.

    Parameters:

    filename - (string):  The URI of the .css file.

    Returns:

    true - The operation completed successfully.
    */
    remove: function(fileName, media) {
        var oDoc = jaxon.config.baseDocument;
        var oHeads = oDoc.getElementsByTagName('head');
        var oHead = oHeads[0];
        var oLinks = oHead.getElementsByTagName('link');

        var i = 0;
        while (i < oLinks.length)
            if (0 <= oLinks[i].href.indexOf(fileName) && oLinks[i].media == media)
                oHead.removeChild(oLinks[i]);
            else ++i;

        return true;
    },

    /*
    Function: jaxon.cmd.style.waitForCSS

    Attempt to detect when all .css files have been loaded once they are referenced by a LINK tag
    in the HEAD of the current document.

    Parameters:

    args - (object):  The response command object which will contain the following:
        - args.prop - (integer):  The number of 1/10ths of a second to wait before giving up.

    Returns:

    true - The .css files appear to be loaded.
    false - The .css files do not appear to be loaded and the timeout has not expired.
    */
    waitForCSS: function(args) {
        var oDocSS = jaxon.config.baseDocument.styleSheets;
        var ssEnabled = [];
        var iLen = oDocSS.length;
        for (var i = 0; i < iLen; ++i) {
            ssEnabled[i] = 0;
            try {
                ssEnabled[i] = oDocSS[i].cssRules.length;
            } catch (e) {
                try {
                    ssEnabled[i] = oDocSS[i].rules.length;
                } catch (e) {}
            }
        }

        var ssLoaded = true;
        var iLen = ssEnabled.length;
        for (var i = 0; i < iLen; ++i)
            if (0 == ssEnabled[i])
                ssLoaded = false;

        if (false == ssLoaded) {
            // inject a delay in the queue processing
            // handle retry counter
            if (jaxon.tools.queue.retry(args, args.prop)) {
                jaxon.ajax.response.setWakeup(jaxon.response, 10);
                return false;
            }
            // give up, continue processing queue
        }
        return true;
    }
};

jaxon.cmd.tree = {
    startResponse: function(args) {
        jxnElm = [];
    },

    createElement: function(args) {
        eval(
            [args.tgt, ' = document.createElement(args.data)']
            .join('')
        );
    },

    setAttribute: function(args) {
        args.context.jaxonDelegateCall = function() {
            eval(
                [args.tgt, '.setAttribute(args.key, args.data)']
                .join('')
            );
        }
        args.context.jaxonDelegateCall();
    },

    appendChild: function(args) {
        args.context.jaxonDelegateCall = function() {
            eval(
                [args.par, '.appendChild(', args.data, ')']
                .join('')
            );
        }
        args.context.jaxonDelegateCall();
    },

    insertBefore: function(args) {
        args.context.jaxonDelegateCall = function() {
            eval(
                [args.tgt, '.parentNode.insertBefore(', args.data, ', ', args.tgt, ')']
                .join('')
            );
        }
        args.context.jaxonDelegateCall();
    },

    insertAfter: function(args) {
        args.context.jaxonDelegateCall = function() {
            eval(
                [args.tgt, 'parentNode.insertBefore(', args.data, ', ', args.tgt, '.nextSibling)']
                .join('')
            );
        }
        args.context.jaxonDelegateCall();
    },

    appendText: function(args) {
        args.context.jaxonDelegateCall = function() {
            eval(
                [args.par, '.appendChild(document.createTextNode(args.data))']
                .join('')
            );
        }
        args.context.jaxonDelegateCall();
    },

    removeChildren: function(args) {
        var skip = args.skip || 0;
        var remove = args.remove || -1;
        var element = null;
        args.context.jaxonDelegateCall = function() {
            eval(['element = ', args.data].join(''));
        }
        args.context.jaxonDelegateCall();
        var children = element.childNodes;
        for (var i in children) {
            if (isNaN(i) == false && children[i].nodeType == 1) {
                if (skip > 0) skip = skip - 1;
                else if (remove != 0) {
                    if (remove > 0)
                        remove = remove - 1;
                    element.removeChild(children[i]);
                }
            }
        }
    },

    endResponse: function(args) {
        jxnElm = [];
    }
};

jaxon.ajax.callback = {
    /*
    Function: jaxon.ajax.callback.create

    Create a blank callback object.
    Two optional arguments let you set the delay time for the onResponseDelay and onExpiration events.

    Returns:

    object - The callback object.
    */
    create: function() {
        var xx = jaxon;
        var xc = xx.config;
        var xcb = xx.ajax.callback;

        var oCB = {}
        oCB.timers = {};

        oCB.timers.onResponseDelay = xcb.setupTimer(
            (arguments.length > 0) ?
            arguments[0] :
            xc.defaultResponseDelayTime);

        oCB.timers.onExpiration = xcb.setupTimer(
            (arguments.length > 1) ?
            arguments[1] :
            xc.defaultExpirationTime);

        oCB.onRequest = null;
        oCB.onResponseDelay = null;
        oCB.onExpiration = null;
        oCB.beforeResponseProcessing = null;
        oCB.onFailure = null;
        oCB.onRedirect = null;
        oCB.onSuccess = null;
        oCB.onComplete = null;

        return oCB;
    },

    /*
    Function: jaxon.ajax.callback.setupTimer

    Create a timer to fire an event in the future.
    This will be used fire the onRequestDelay and onExpiration events.

    Parameters:

    iDelay - (integer):  The amount of time in milliseconds to delay.

    Returns:

    object - A callback timer object.
    */
    setupTimer: function(iDelay) {
        return { timer: null, delay: iDelay };
    },

    /*
    Function: jaxon.ajax.callback.clearTimer

    Clear a callback timer for the specified function.

    Parameters:

    oCallback - (object):  The callback object (or objects) that
        contain the specified function timer to be cleared.
    sFunction - (string):  The name of the function associated
        with the timer to be cleared.
    */
    clearTimer: function(oCallback, sFunction) {
        if ('undefined' != typeof oCallback.timers) {
            if ('undefined' != typeof oCallback.timers[sFunction]) {
                clearTimeout(oCallback.timers[sFunction].timer);
            }
        } else if ('object' == typeof oCallback) {
            var iLen = oCallback.length;
            for (var i = 0; i < iLen; ++i)
                jaxon.ajax.callback.clearTimer(oCallback[i], sFunction);
        }
    },

    /*
    Function: jaxon.ajax.callback.execute

    Execute a callback event.

    Parameters:

    oCallback - (object):  The callback object (or objects) which
        contain the event handlers to be executed.
    sFunction - (string):  The name of the event to be triggered.
    args - (object):  The request object for this request.
    */
    execute: function(oCallback, sFunction, args) {
        if ('undefined' != typeof oCallback[sFunction]) {
            var func = oCallback[sFunction];
            if ('function' == typeof func) {
                if ('undefined' != typeof oCallback.timers[sFunction]) {
                    oCallback.timers[sFunction].timer = setTimeout(function() {
                        func(args);
                    }, oCallback.timers[sFunction].delay);
                } else {
                    func(args);
                }
            }
        } else if ('object' == typeof oCallback) {
            var iLen = oCallback.length;
            for (var i = 0; i < iLen; ++i)
                jaxon.ajax.callback.execute(oCallback[i], sFunction, args);
        }
    }
};

jaxon.ajax.handler = {
    /*
    Object: jaxon.ajax.handler.handlers

    An array that is used internally in the jaxon.fn.handler object
    to keep track of command handlers that have been registered.
    */
    handlers: [],

    /*
    Function: jaxon.ajax.handler.execute

    Perform a lookup on the command specified by the response command
    object passed in the first parameter.  If the command exists, the
    function checks to see if the command references a DOM object by
    ID; if so, the object is located within the DOM and added to the
    command data.  The command handler is then called.

    If the command handler returns true, it is assumed that the command
    completed successfully.  If the command handler returns false, then the
    command is considered pending; jaxon enters a wait state.  It is up
    to the command handler to set an interval, timeout or event handler
    which will restart the jaxon response processing.

    Parameters:

    obj - (object):  The response command to be executed.

    Returns:

    true - The command completed successfully.
    false - The command signalled that it needs to pause processing.
    */
    execute: function(command) {
        if (jaxon.ajax.handler.isRegistered(command)) {
            // it is important to grab the element here as the previous command
            // might have just created the element
            if (command.id)
                command.target = jaxon.$(command.id);
            // process the command
            if (false == jaxon.ajax.handler.call(command)) {
                jaxon.tools.queue.pushFront(jaxon.response, command);
                return false;
            }
        }
        return true;
    },

    /*
    Function: jaxon.ajax.handler.register

    Registers a new command handler.
    */
    register: function(shortName, func) {
        jaxon.ajax.handler.handlers[shortName] = func;
    },

    /*
    Function: jaxon.ajax.handler.unregister

    Unregisters and returns a command handler.

    Parameters:
        shortName - (string): The name of the command handler.

    Returns:
        func - (function): The unregistered function.
    */
    unregister: function(shortName) {
        var func = jaxon.ajax.handler.handlers[shortName];
        delete jaxon.ajax.handler.handlers[shortName];
        return func;
    },

    /*
    Function: jaxon.ajax.handler.isRegistered


    Parameters:
        command - (object):
            - cmd: The Name of the function.

    Returns:

    boolean - (true or false): depending on whether a command handler has
    been created for the specified command (object).

    */
    isRegistered: function(command) {
        var shortName = command.cmd;
        if (jaxon.ajax.handler.handlers[shortName])
            return true;
        return false;
    },

    /*
    Function: jaxon.ajax.handler.call

    Calls the registered command handler for the specified command
    (you should always check isRegistered before calling this function)

    Parameters:
        command - (object):
            - cmd: The Name of the function.

    Returns:
        true - (boolean) :
    */
    call: function(command) {
        var shortName = command.cmd;
        return jaxon.ajax.handler.handlers[shortName](command);
    }
};

jaxon.ajax.handler.register('rcmplt', function(args) {
    jaxon.ajax.response.complete(args.request);
    return true;
});

jaxon.ajax.handler.register('css', function(args) {
    args.fullName = 'includeCSS';
    if ('undefined' == typeof args.media)
        args.media = 'screen';
    return jaxon.cmd.style.add(args.data, args.media);
});
jaxon.ajax.handler.register('rcss', function(args) {
    args.fullName = 'removeCSS';
    if ('undefined' == typeof args.media)
        args.media = 'screen';
    return jaxon.cmd.style.remove(args.data, args.media);
});
jaxon.ajax.handler.register('wcss', function(args) {
    args.fullName = 'waitForCSS';
    return jaxon.cmd.style.waitForCSS(args);
});

jaxon.ajax.handler.register('as', function(args) {
    args.fullName = 'assign/clear';
    try {
        return jaxon.cmd.node.assign(args.target, args.prop, args.data);
    } catch (e) {
        // do nothing, if the debug module is installed it will
        // catch and handle the exception
    }
    return true;
});
jaxon.ajax.handler.register('ap', function(args) {
    args.fullName = 'append';
    return jaxon.cmd.node.append(args.target, args.prop, args.data);
});
jaxon.ajax.handler.register('pp', function(args) {
    args.fullName = 'prepend';
    return jaxon.cmd.node.prepend(args.target, args.prop, args.data);
});
jaxon.ajax.handler.register('rp', function(args) {
    args.fullName = 'replace';
    return jaxon.cmd.node.replace(args.id, args.prop, args.data);
});
jaxon.ajax.handler.register('rm', function(args) {
    args.fullName = 'remove';
    return jaxon.cmd.node.remove(args.id);
});
jaxon.ajax.handler.register('ce', function(args) {
    args.fullName = 'create';
    return jaxon.cmd.node.create(args.id, args.data, args.prop);
});
jaxon.ajax.handler.register('ie', function(args) {
    args.fullName = 'insert';
    return jaxon.cmd.node.insert(args.id, args.data, args.prop);
});
jaxon.ajax.handler.register('ia', function(args) {
    args.fullName = 'insertAfter';
    return jaxon.cmd.node.insertAfter(args.id, args.data, args.prop);
});

jaxon.ajax.handler.register('DSR', jaxon.cmd.tree.startResponse);
jaxon.ajax.handler.register('DCE', jaxon.cmd.tree.createElement);
jaxon.ajax.handler.register('DSA', jaxon.cmd.tree.setAttribute);
jaxon.ajax.handler.register('DAC', jaxon.cmd.tree.appendChild);
jaxon.ajax.handler.register('DIB', jaxon.cmd.tree.insertBefore);
jaxon.ajax.handler.register('DIA', jaxon.cmd.tree.insertAfter);
jaxon.ajax.handler.register('DAT', jaxon.cmd.tree.appendText);
jaxon.ajax.handler.register('DRC', jaxon.cmd.tree.removeChildren);
jaxon.ajax.handler.register('DER', jaxon.cmd.tree.endResponse);

jaxon.ajax.handler.register('c:as', jaxon.cmd.node.contextAssign);
jaxon.ajax.handler.register('c:ap', jaxon.cmd.node.contextAppend);
jaxon.ajax.handler.register('c:pp', jaxon.cmd.node.contextPrepend);

jaxon.ajax.handler.register('s', jaxon.cmd.script.sleep);
jaxon.ajax.handler.register('ino', jaxon.cmd.script.includeScriptOnce);
jaxon.ajax.handler.register('in', jaxon.cmd.script.includeScript);
jaxon.ajax.handler.register('rjs', jaxon.cmd.script.removeScript);
jaxon.ajax.handler.register('wf', jaxon.cmd.script.waitFor);
jaxon.ajax.handler.register('js', jaxon.cmd.script.execute);
jaxon.ajax.handler.register('jc', jaxon.cmd.script.call);
jaxon.ajax.handler.register('sf', jaxon.cmd.script.setFunction);
jaxon.ajax.handler.register('wpf', jaxon.cmd.script.wrapFunction);
jaxon.ajax.handler.register('al', function(args) {
    args.fullName = 'alert';
    alert(args.data);
    return true;
});
jaxon.ajax.handler.register('cc', jaxon.cmd.script.confirmCommands);

jaxon.ajax.handler.register('ci', jaxon.cmd.form.createInput);
jaxon.ajax.handler.register('ii', jaxon.cmd.form.insertInput);
jaxon.ajax.handler.register('iia', jaxon.cmd.form.insertInputAfter);

jaxon.ajax.handler.register('ev', jaxon.cmd.event.setEvent);

jaxon.ajax.handler.register('ah', jaxon.cmd.event.addHandler);
jaxon.ajax.handler.register('rh', jaxon.cmd.event.removeHandler);

jaxon.ajax.handler.register('dbg', function(args) {
    args.fullName = 'debug message';
    console.log(args.data);
    return true;
});


jaxon.ajax.message = {
    /*
    Function: jaxon.ajax.message.success

    Print a success message on the screen.

    Parameters:
        content - (string):  The message content.
        title - (string):  The message title.
    */
    success: function(content, title) {
        alert(content);
    },

    /*
    Function: jaxon.ajax.message.info

    Print an info message on the screen.

    Parameters:
        content - (string):  The message content.
        title - (string):  The message title.
    */
    info: function(content, title) {
        alert(content);
    },

    /*
    Function: jaxon.ajax.message.warning

    Print a warning message on the screen.

    Parameters:
        content - (string):  The message content.
        title - (string):  The message title.
    */
    warning: function(content, title) {
        alert(content);
    },

    /*
    Function: jaxon.ajax.message.error

    Print an error message on the screen.

    Parameters:
        content - (string):  The message content.
        title - (string):  The message title.
    */
    error: function(content, title) {
        alert(content);
    },

    /*
    Function: jaxon.ajax.message.confirm

    Print an error message on the screen.

    Parameters:
        question - (string):  The confirm question.
        title - (string):  The confirm title.
        yesCallback - (Function): The function to call if the user answers yes.
        noCallback - (Function): The function to call if the user answers no.
    */
    confirm: function(question, title, yesCallback, noCallback) {
        if(noCallback == undefined)
            noCallback = function(){};
        if(confirm(question))
            yesCallback();
        else
            noCallback();
    }
};

jaxon.ajax.parameters = {
    /*
    Function: jaxon.ajax.parameters.upload

    Create a parameter of type upload.

    Parameters:

    id - The id od the upload form element
    */
    /*upload: function(id) {
        return {upload: {id: id}};
    },*/

    /*
    Function: jaxon.ajax.parameters.isUpload

    Check if a parameter is of type upload.

    Parameters:

    parameter - A parameter passed to an Ajax function
    */
    /*isUpload: function(parameter) {
        return (parameter != null && typeof parameter == 'object' && typeof parameter.upload == 'object');
    },*/

    /*
    Function: jaxon.ajax.parameters.toFormData

    Processes request specific parameters and store them in a FormData object.

    Parameters:

    oRequest - A request object, created initially by a call to <jaxon.ajax.request.initialize>
    */
    toFormData: function(oRequest) {
        var xx = jaxon;
        var xt = xx.tools;

        var rd = new FormData();
        var input = oRequest.upload.input;
        for (var i = 0, n = input.files.length; i < n; i++) {
            rd.append(input.name, input.files[i]);
        }

        var separator = '';
        for (var sCommand in oRequest.functionName) {
            if ('constructor' != sCommand) {
                rd.append(sCommand, encodeURIComponent(oRequest.functionName[sCommand]));
            }
        }
        var dNow = new Date();
        rd.append('jxnr', dNow.getTime());
        delete dNow;

        if (oRequest.parameters) {
            var i = 0;
            var iLen = oRequest.parameters.length;
            while (i < iLen) {
                var oVal = oRequest.parameters[i];
                // Don't include upload parameter
                /*if(jaxon.ajax.parameters.isUpload(oVal)) {
                    continue;
                }*/
                if ('object' == typeof oVal && null != oVal) {
                    try {
                        oVal = JSON.stringify(oVal);
                    } catch (e) {
                        oVal = '';
                        // do nothing, if the debug module is installed
                        // it will catch the exception and handle it
                    }
                    oVal = encodeURIComponent(oVal);
                    rd.append('jxnargs[]', oVal);
                    ++i;
                } else {
                    if ('undefined' == typeof oVal || null == oVal) {
                        rd.append('jxnargs[]', '*');
                    } else {
                        var sPrefix = '';
                        var sType = typeof oVal;
                        if ('string' == sType)
                            sPrefix = 'S';
                        else if ('boolean' == sType)
                            sPrefix = 'B';
                        else if ('number' == sType)
                            sPrefix = 'N';
                        oVal = encodeURIComponent(oVal);
                        rd.append('jxnargs[]', sPrefix + oVal);
                    }
                    ++i;
                }
            }
        }

        oRequest.requestURI = oRequest.URI;
        oRequest.requestData = rd;
    },

    /*
    Function: jaxon.ajax.parameters.toUrlEncoded

    Processes request specific parameters and store them in an URL encoded string.

    Parameters:

    oRequest - A request object, created initially by a call to <jaxon.ajax.request.initialize>
    */
    toUrlEncoded: function(oRequest) {
        var xx = jaxon;
        var xt = xx.tools;

        var rd = [];

        var separator = '';
        for (var sCommand in oRequest.functionName) {
            if ('constructor' != sCommand) {
                rd.push(separator);
                rd.push(sCommand);
                rd.push('=');
                rd.push(encodeURIComponent(oRequest.functionName[sCommand]));
                separator = '&';
            }
        }
        var dNow = new Date();
        rd.push('&jxnr=');
        rd.push(dNow.getTime());
        delete dNow;

        if (oRequest.parameters) {
            var i = 0;
            var iLen = oRequest.parameters.length;
            while (i < iLen) {
                var oVal = oRequest.parameters[i];
                // Don't include upload parameter
                /*if(jaxon.ajax.parameters.isUpload(oVal)) {
                    continue;
                }*/
                if ('object' == typeof oVal && null != oVal) {
                    try {
                        // var oGuard = {};
                        // oGuard.depth = 0;
                        // oGuard.maxDepth = oRequest.maxObjectDepth;
                        // oGuard.size = 0;
                        // oGuard.maxSize = oRequest.maxObjectSize;
                        // oVal = xt._objectToXML(oVal, oGuard);
                        oVal = JSON.stringify(oVal);
                    } catch (e) {
                        oVal = '';
                        // do nothing, if the debug module is installed
                        // it will catch the exception and handle it
                    }
                    rd.push('&jxnargs[]=');
                    oVal = encodeURIComponent(oVal);
                    rd.push(oVal);
                    ++i;
                } else {
                    rd.push('&jxnargs[]=');

                    if ('undefined' == typeof oVal || null == oVal) {
                        rd.push('*');
                    } else {
                        var sType = typeof oVal;
                        if ('string' == sType)
                            rd.push('S');
                        else if ('boolean' == sType)
                            rd.push('B');
                        else if ('number' == sType)
                            rd.push('N');
                        oVal = encodeURIComponent(oVal);
                        rd.push(oVal);
                    }
                    ++i;
                }
            }
        }

        oRequest.requestURI = oRequest.URI;

        if ('GET' == oRequest.method) {
            oRequest.requestURI += oRequest.requestURI.indexOf('?') == -1 ? '?' : '&';
            oRequest.requestURI += rd.join('');
            rd = [];
        }

        oRequest.requestData = rd.join('');
    },

    /*
    Function: jaxon.ajax.parameters.process

    Processes request specific parameters and generates the temporary
    variables needed by jaxon to initiate and process the request.

    Parameters:

    oRequest - A request object, created initially by a call to <jaxon.ajax.request.initialize>

    Note:
    This is called once per request; upon a request failure, this
    will not be called for additional retries.
    */
    process: function(oRequest) {
        // Make request parameters.
        if (oRequest.upload != false && oRequest.upload.ajax && oRequest.upload.input)
            jaxon.ajax.parameters.toFormData(oRequest);
        else
            jaxon.ajax.parameters.toUrlEncoded(oRequest);
    }
};

jaxon.ajax.request = {
    /*
    Function: jaxon.ajax.request.initialize

    Initialize a request object, populating default settings, where
    call specific settings are not already provided.

    Parameters:

    oRequest - (object):  An object that specifies call specific settings
        that will, in addition, be used to store all request related
        values.  This includes temporary values used internally by jaxon.
    */
    initialize: function(oRequest) {
        var xx = jaxon;
        var xc = xx.config;

        oRequest.append = function(opt, def) {
            if ('undefined' == typeof this[opt])
                this[opt] = {};
            for (var itmName in def)
                if ('undefined' == typeof this[opt][itmName])
                    this[opt][itmName] = def[itmName];
        };

        oRequest.append('commonHeaders', xc.commonHeaders);
        oRequest.append('postHeaders', xc.postHeaders);
        oRequest.append('getHeaders', xc.getHeaders);

        oRequest.set = function(option, defaultValue) {
            if ('undefined' == typeof this[option])
                this[option] = defaultValue;
        };

        oRequest.set('statusMessages', xc.statusMessages);
        oRequest.set('waitCursor', xc.waitCursor);
        oRequest.set('mode', xc.defaultMode);
        oRequest.set('method', xc.defaultMethod);
        oRequest.set('URI', xc.requestURI);
        oRequest.set('httpVersion', xc.defaultHttpVersion);
        oRequest.set('contentType', xc.defaultContentType);
        oRequest.set('retry', xc.defaultRetry);
        oRequest.set('returnValue', xc.defaultReturnValue);
        oRequest.set('maxObjectDepth', xc.maxObjectDepth);
        oRequest.set('maxObjectSize', xc.maxObjectSize);
        oRequest.set('context', window);
        oRequest.set('upload', false);

        var xcb = xx.ajax.callback;
        var gcb = xx.callback;
        var lcb = xcb.create();

        lcb.take = function(frm, opt) {
            if ('undefined' != typeof frm[opt]) {
                lcb[opt] = frm[opt];
                lcb.hasEvents = true;
            }
            delete frm[opt];
        };

        lcb.take(oRequest, 'onRequest');
        lcb.take(oRequest, 'onResponseDelay');
        lcb.take(oRequest, 'onExpiration');
        lcb.take(oRequest, 'beforeResponseProcessing');
        lcb.take(oRequest, 'onFailure');
        lcb.take(oRequest, 'onRedirect');
        lcb.take(oRequest, 'onSuccess');
        lcb.take(oRequest, 'onComplete');

        if ('undefined' != typeof oRequest.callback) {
            if (lcb.hasEvents)
                oRequest.callback = [oRequest.callback, lcb];
        } else
            oRequest.callback = lcb;

        oRequest.status = (oRequest.statusMessages) ?
            xc.status.update() :
            xc.status.dontUpdate();

        oRequest.cursor = (oRequest.waitCursor) ?
            xc.cursor.update() :
            xc.cursor.dontUpdate();

        oRequest.method = oRequest.method.toUpperCase();
        if ('GET' != oRequest.method)
            oRequest.method = 'POST'; // W3C: Method is case sensitive

        oRequest.requestRetry = oRequest.retry;

        // Look for upload parameter
        jaxon.tools.upload.initialize(oRequest);

        delete oRequest['append'];
        delete oRequest['set'];
        delete oRequest['take'];

        if ('undefined' == typeof oRequest.URI)
            throw { code: 10005 };
    },

    /*
    Function: jaxon.ajax.request.prepare

    Prepares the XMLHttpRequest object for this jaxon request.

    Parameters:

    oRequest - (object):  An object created by a call to <jaxon.ajax.request.initialize>
        which already contains the necessary parameters and temporary variables
        needed to initiate and process a jaxon request.

    Note:
    This is called each time a request object is being prepared for a call to the server.
    If the request is retried, the request must be prepared again.
    */
    prepare: function(oRequest) {
        var xx = jaxon;
        var xt = xx.tools;

        oRequest.request = xt.ajax.createRequest();

        oRequest.setRequestHeaders = function(headers) {
            if ('object' == typeof headers) {
                for (var optionName in headers)
                    this.request.setRequestHeader(optionName, headers[optionName]);
            }
        };
        oRequest.setCommonRequestHeaders = function() {
            this.setRequestHeaders(this.commonHeaders);
            if (this.challengeResponse)
                this.request.setRequestHeader('challenge-response', this.challengeResponse);
        };
        oRequest.setPostRequestHeaders = function() {
            this.setRequestHeaders(this.postHeaders);
        };
        oRequest.setGetRequestHeaders = function() {
            this.setRequestHeaders(this.getHeaders);
        };

        if ('asynchronous' == oRequest.mode) {
            // references inside this function should be expanded
            // IOW, don't use shorthand references like xx for jaxon
            oRequest.request.onreadystatechange = function() {
                if (oRequest.request.readyState != 4)
                    return;
                jaxon.ajax.response.received(oRequest);
            };
            oRequest.finishRequest = function() {
                return this.returnValue;
            };
        } else {
            oRequest.finishRequest = function() {
                return jaxon.ajax.response.received(oRequest);
            };
        }

        if ('undefined' != typeof oRequest.userName && 'undefined' != typeof oRequest.password) {
            oRequest.open = function() {
                this.request.open(
                    this.method,
                    this.requestURI,
                    'asynchronous' == this.mode,
                    oRequest.userName,
                    oRequest.password);
            };
        } else {
            oRequest.open = function() {
                this.request.open(
                    this.method,
                    this.requestURI,
                    'asynchronous' == this.mode);
            };
        }

        if ('POST' == oRequest.method) { // W3C: Method is case sensitive
            oRequest.applyRequestHeaders = function() {
                this.setCommonRequestHeaders();
                try {
                    this.setPostRequestHeaders();
                } catch (e) {
                    this.method = 'GET';
                    this.requestURI += this.requestURI.indexOf('?') == -1 ? '?' : '&';
                    this.requestURI += this.requestData;
                    this.requestData = '';
                    if (0 == this.requestRetry) this.requestRetry = 1;
                    throw e;
                }
            }
        } else {
            oRequest.applyRequestHeaders = function() {
                this.setCommonRequestHeaders();
                this.setGetRequestHeaders();
            };
        }
    },

    /*
    Function: jaxon.ajax.request.submit

    Create a request object and submit the request using the specified request type;
    all request parameters should be finalized by this point.
    Upon failure of a POST, this function will fall back to a GET request.

    Parameters:
    oRequest - (object):  The request context object.
    */
    submit: function(oRequest) {
        oRequest.status.onRequest();

        var xx = jaxon;
        var xcb = xx.ajax.callback;
        var gcb = xx.callback;
        var lcb = oRequest.callback;

        xcb.execute([gcb, lcb], 'onResponseDelay', oRequest);
        xcb.execute([gcb, lcb], 'onExpiration', oRequest);
        xcb.execute([gcb, lcb], 'onRequest', oRequest);

        oRequest.open();
        oRequest.applyRequestHeaders();

        oRequest.cursor.onWaiting();
        oRequest.status.onWaiting();

        if (oRequest.upload != false && !oRequest.upload.ajax && oRequest.upload.form) {
            // The request will be sent after the files are uploaded
            oRequest.upload.iframe.onload = function() {
                jaxon.ajax.response.upload(oRequest);
            }
            // Submit the upload form
            oRequest.upload.form.submit();
        } else {
            jaxon.ajax.request._send(oRequest);
        }

        // synchronous mode causes response to be processed immediately here
        return oRequest.finishRequest();
    },

    /*
    Function: jaxon.ajax.request._send

    This function is used internally by jaxon to initiate a request to the server.

    Parameters:

    oRequest - (object):  The request context object.
    */
    _send: function(oRequest) {
        // this may block if synchronous mode is selected
        oRequest.request.send(oRequest.requestData);
    },

    /*
    Function: jaxon.ajax.request.abort

    Abort the request.

    Parameters:

    oRequest - (object):  The request context object.
    */
    abort: function(oRequest) {
        oRequest.aborted = true;
        oRequest.request.abort();
        jaxon.ajax.response.complete(oRequest);
    },

    /*
    Function: jaxon.ajax.request.execute

    Initiates a request to the server.

    Parameters:

    functionName - (object):  An object containing the name of the function to execute
    on the server. The standard request is: {jxnfun:'function_name'}

    oRequest - (object, optional):  A request object which
        may contain call specific parameters.  This object will be
        used by jaxon to store all the request parameters as well
        as temporary variables needed during the processing of the
        request.

    */
    execute: function() {
        var numArgs = arguments.length;
        if (0 == numArgs)
            return false;

        var oRequest = {};
        if (1 < numArgs)
            oRequest = arguments[1];

        oRequest.functionName = arguments[0];

        var xx = jaxon;

        xx.ajax.request.initialize(oRequest);
        xx.ajax.parameters.process(oRequest);
        while (0 < oRequest.requestRetry) {
            try {
                --oRequest.requestRetry;
                xx.ajax.request.prepare(oRequest);
                return xx.ajax.request.submit(oRequest);
            } catch (e) {
                jaxon.ajax.callback.execute(
                    [jaxon.callback, oRequest.callback],
                    'onFailure',
                    oRequest
                );
                if (0 == oRequest.requestRetry)
                    throw e;
            }
        }
    }
};

jaxon.ajax.response = {
    /*
    Function: jaxon.ajax.response.received

    Process the response.

    Parameters:

    oRequest - (object):  The request context object.
    */
    received: function(oRequest) {
        var xx = jaxon;
        var xcb = xx.ajax.callback;
        var gcb = xx.callback;
        var lcb = oRequest.callback;
        // sometimes the responseReceived gets called when the
        // request is aborted
        if (oRequest.aborted)
            return;

        xcb.clearTimer([gcb, lcb], 'onExpiration');
        xcb.clearTimer([gcb, lcb], 'onResponseDelay');

        xcb.execute([gcb, lcb], 'beforeResponseProcessing', oRequest);

        var challenge = oRequest.request.getResponseHeader('challenge');
        if (challenge) {
            oRequest.challengeResponse = challenge;
            xx.ajax.request.prepare(oRequest);
            return xx.ajax.request.submit(oRequest);
        }

        var fProc = xx.ajax.response.processor(oRequest);
        if ('undefined' == typeof fProc) {
            xcb.execute([gcb, lcb], 'onFailure', oRequest);
            xx.ajax.response.complete(oRequest);
            return;
        }

        return fProc(oRequest);
    },

    /*
    Function: jaxon.ajax.response.complete

    Called by the response command queue processor when all commands have been processed.

    Parameters:

    oRequest - (object):  The request context object.
    */
    complete: function(oRequest) {
        jaxon.ajax.callback.execute(
            [jaxon.callback, oRequest.callback],
            'onComplete',
            oRequest
        );
        oRequest.cursor.onComplete();
        oRequest.status.onComplete();
        // clean up -- these items are restored when the request is initiated
        delete oRequest['functionName'];
        delete oRequest['requestURI'];
        delete oRequest['requestData'];
        delete oRequest['requestRetry'];
        delete oRequest['request'];
        delete oRequest['set'];
        delete oRequest['open'];
        delete oRequest['setRequestHeaders'];
        delete oRequest['setCommonRequestHeaders'];
        delete oRequest['setPostRequestHeaders'];
        delete oRequest['setGetRequestHeaders'];
        delete oRequest['applyRequestHeaders'];
        delete oRequest['finishRequest'];
        delete oRequest['status'];
        delete oRequest['cursor'];
        delete oRequest['challengeResponse'];
    },

    /*
    Function: jaxon.ajax.response.process

    While entries exist in the queue, pull and entry out and process it's command.
    When a command returns false, the processing is halted.

    Parameters:

    theQ - (object): The queue object to process.
    This should have been crated by calling <jaxon.tools.queue.create>.

    Returns:

    true - The queue was fully processed and is now empty.
    false - The queue processing was halted before the queue was fully processed.

    Note:

    - Use <jaxon.ajax.response.setWakeup> or call this function to cause the queue processing to continue.
    - This will clear the associated timeout, this function is not designed to be reentrant.
    - When an exception is caught, do nothing; if the debug module is installed, it will catch the exception and handle it.
    */
    process: function(theQ) {
        if (null != theQ.timeout) {
            clearTimeout(theQ.timeout);
            theQ.timeout = null;
        }
        var obj = jaxon.tools.queue.pop(theQ);
        while (null != obj) {
            try {
                if (false == jaxon.ajax.handler.execute(obj))
                    return false;
            } catch (e) {
                console.log(e);
            }
            delete obj;

            obj = jaxon.tools.queue.pop(theQ);
        }
        return true;
    },

    /*
    Function: jaxon.ajax.response.setWakeup

    Set or reset a timeout that is used to restart processing of the queue.
    This allows the queue to asynchronously wait for an event to occur (giving the browser time
    to process pending events, like loading files)

    Parameters:

    theQ - (object):
        The queue to process upon timeout.

    when - (integer):
        The number of milliseconds to wait before starting/restarting the processing of the queue.
    */
    setWakeup: function(theQ, when) {
        if (null != theQ.timeout) {
            clearTimeout(theQ.timeout);
            theQ.timeout = null;
        }
        theQ.timout = setTimeout(function() { jaxon.ajax.response.process(theQ); }, when);
    },

    /*
    Function: jaxon.ajax.response.processor

    This function attempts to determine, based on the content type of the reponse, what processor
    should be used for handling the response data.

    The default jaxon response will be text/json which will invoke the json response processor.
    Other response processors may be added in the future.  The user can specify their own response
    processor on a call by call basis.

    Parameters:

    oRequest - (object):  The request context object.
    */
    processor: function(oRequest) {
        var fProc;

        if ('undefined' == typeof oRequest.responseProcessor) {
            var cTyp = oRequest.request.getResponseHeader('content-type');
            if (cTyp) {
                if (0 <= cTyp.indexOf('application/json')) {
                    fProc = jaxon.ajax.response.json;
                }
            }
        } else {
            fProc = oRequest.responseProcessor;
        }
        return fProc;
    },

    /*
    Function: jaxon.ajax.response.json

    This is the JSON response processor.

    Parameters:

    oRequest - (object):  The request context object.
    */
    json: function(oRequest) {

        var xx = jaxon;
        var xt = xx.tools;
        var xcb = xx.ajax.callback;
        var gcb = xx.callback;
        var lcb = oRequest.callback;

        var oRet = oRequest.returnValue;

        if (xt.array.is_in(xx.ajax.response.successCodes, oRequest.request.status)) {
            xcb.execute([gcb, lcb], 'onSuccess', oRequest);
            var seq = 0;
            if (oRequest.request.responseText) {
                try {
                    var responseJSON = eval('(' + oRequest.request.responseText + ')');
                } catch (ex) {
                    throw (ex);
                }
                if (('object' == typeof responseJSON) && ('object' == typeof responseJSON.jxnobj)) {
                    oRequest.status.onProcessing();
                    oRet = xt.ajax.processFragment(responseJSON, seq, oRet, oRequest);
                } else {}
            }
            var obj = {};
            obj.fullName = 'Response Complete';
            obj.sequence = seq;
            obj.request = oRequest;
            obj.context = oRequest.context;
            obj.cmd = 'rcmplt';
            xt.queue.push(xx.response, obj);

            // do not re-start the queue if a timeout is set
            if (null == xx.response.timeout)
                xx.ajax.response.process(xx.response);
        } else if (xt.array.is_in(xx.ajax.response.redirectCodes, oRequest.request.status)) {
            xcb.execute([gcb, lcb], 'onRedirect', oRequest);
            window.location = oRequest.request.getResponseHeader('location');
            xx.ajax.response.complete(oRequest);
        } else if (xt.array.is_in(xx.ajax.response.errorsForAlert, oRequest.request.status)) {
            xcb.execute([gcb, lcb], 'onFailure', oRequest);
            xx.ajax.response.complete(oRequest);
        }

        return oRet;
    },

    /*
    Function: jaxon.ajax.response.upload

    Process the file upload response received in an iframe.

    Parameters:

    oRequest - (object):  The request context object.
    */
    upload: function(oRequest) {
        var xx = jaxon;
        var xcb = xx.ajax.callback;
        var gcb = xx.callback;
        var lcb = oRequest.callback;

        var endRequest = false;
        var res = oRequest.upload.iframe.contentWindow.res;
        if (!res || !res.code) {
            // Show the error message with the selected dialog library
            jaxon.ajax.message.error('The server returned an invalid response');
            // End the request
            endRequest = true;
        } else if (res.code == 'error') {
            // Todo: show the error message with the selected dialog library
            jaxon.ajax.message.error(res.msg);
            // End the request
            endRequest = true;
        }

        if (endRequest) {
            // End the request
            xcb.clearTimer([gcb, lcb], 'onExpiration');
            xcb.clearTimer([gcb, lcb], 'onResponseDelay');
            xcb.execute([gcb, lcb], 'onFailure', oRequest);
            jaxon.ajax.response.complete(oRequest);
            return;
        }

        if (res.code = 'success') {
            oRequest.requestData += '&jxnupl=' + encodeURIComponent(res.upl);
            jaxon.ajax.request._send(oRequest);
        }
    },

    /*
    Object: jaxon.ajax.response.successCodes

    This array contains a list of codes which will be returned from the server upon
    successful completion of the server portion of the request.

    These values should match those specified in the HTTP standard.
    */
    successCodes: ['0', '200'],

    // 10.4.1 400 Bad Request
    // 10.4.2 401 Unauthorized
    // 10.4.3 402 Payment Required
    // 10.4.4 403 Forbidden
    // 10.4.5 404 Not Found
    // 10.4.6 405 Method Not Allowed
    // 10.4.7 406 Not Acceptable
    // 10.4.8 407 Proxy Authentication Required
    // 10.4.9 408 Request Timeout
    // 10.4.10 409 Conflict
    // 10.4.11 410 Gone
    // 10.4.12 411 Length Required
    // 10.4.13 412 Precondition Failed
    // 10.4.14 413 Request Entity Too Large
    // 10.4.15 414 Request-URI Too Long
    // 10.4.16 415 Unsupported Media Type
    // 10.4.17 416 Requested Range Not Satisfiable
    // 10.4.18 417 Expectation Failed
    // 10.5 Server Error 5xx
    // 10.5.1 500 Internal Server Error
    // 10.5.2 501 Not Implemented
    // 10.5.3 502 Bad Gateway
    // 10.5.4 503 Service Unavailable
    // 10.5.5 504 Gateway Timeout
    // 10.5.6 505 HTTP Version Not Supported

    /*
    Object: jaxon.ajax.response.errorsForAlert

    This array contains a list of status codes returned by the server to indicate that
    the request failed for some reason.
    */
    errorsForAlert: ['400', '401', '402', '403', '404', '500', '501', '502', '503'],

    // 10.3.1 300 Multiple Choices
    // 10.3.2 301 Moved Permanently
    // 10.3.3 302 Found
    // 10.3.4 303 See Other
    // 10.3.5 304 Not Modified
    // 10.3.6 305 Use Proxy
    // 10.3.7 306 (Unused)
    // 10.3.8 307 Temporary Redirect

    /*
    Object: jaxon.ajax.response.redirectCodes

    An array of status codes returned from the server to indicate a request for redirect to another URL.

    Typically, this is used by the server to send the browser to another URL.
    This does not typically indicate that the jaxon request should be sent to another URL.
    */
    redirectCodes: ['301', '302', '307']
};

/**
 * Class: jaxon.dom
 */
jaxon.dom = {};

/**
 * Plain javascript replacement for jQuery's .ready() function.
 * See https://github.com/jfriend00/docReady for a detailed description, copyright and license information.
 */
(function(funcName, baseObj) {
    "use strict";
    // The public function name defaults to window.docReady
    // but you can modify the last line of this function to pass in a different object or method name
    // if you want to put them in a different namespace and those will be used instead of
    // window.docReady(...)
    funcName = funcName || "docReady";
    baseObj = baseObj || window;
    var readyList = [];
    var readyFired = false;
    var readyEventHandlersInstalled = false;

    // call this when the document is ready
    // this function protects itself against being called more than once
    function ready() {
        if (!readyFired) {
            // this must be set to true before we start calling callbacks
            readyFired = true;
            for (var i = 0; i < readyList.length; i++) {
                // if a callback here happens to add new ready handlers,
                // the docReady() function will see that it already fired
                // and will schedule the callback to run right after
                // this event loop finishes so all handlers will still execute
                // in order and no new ones will be added to the readyList
                // while we are processing the list
                readyList[i].fn.call(window, readyList[i].ctx);
            }
            // allow any closures held by these functions to free
            readyList = [];
        }
    }

    function readyStateChange() {
        if (document.readyState === "complete") {
            ready();
        }
    }

    // This is the one public interface
    // docReady(fn, context);
    // the context argument is optional - if present, it will be passed
    // as an argument to the callback
    baseObj[funcName] = function(callback, context) {
        // if ready has already fired, then just schedule the callback
        // to fire asynchronously, but right away
        if (readyFired) {
            setTimeout(function() { callback(context); }, 1);
            return;
        } else {
            // add the function and context to the list
            readyList.push({ fn: callback, ctx: context });
        }
        // if document already ready to go, schedule the ready function to run
        // IE only safe when readyState is "complete", others safe when readyState is "interactive"
        if (document.readyState === "complete" || (!document.attachEvent && document.readyState === "interactive")) {
            setTimeout(ready, 1);
        } else if (!readyEventHandlersInstalled) {
            // otherwise if we don't have event handlers installed, install them
            if (document.addEventListener) {
                // first choice is DOMContentLoaded event
                document.addEventListener("DOMContentLoaded", ready, false);
                // backup is window load event
                window.addEventListener("load", ready, false);
            } else {
                // must be IE
                document.attachEvent("onreadystatechange", readyStateChange);
                window.attachEvent("onload", ready);
            }
            readyEventHandlersInstalled = true;
        }
    }
})("ready", jaxon.dom);

/*
    File: jaxon.js

    This file contains the definition of the main jaxon javascript core.

    This is the client side code which runs on the web browser or similar web enabled application.
    Include this in the HEAD of each page for which you wish to use jaxon.

    Title: jaxon core javascript library

    Please see <copyright.inc.php> for a detailed description, copyright and license information.
*/

/*
    @package jaxon
    @version $Id: jaxon.core.js 327 2007-02-28 16:55:26Z calltoconstruct $
    @copyright Copyright (c) 2005-2007 by Jared White & J. Max Wilson
    @copyright Copyright (c) 2008-2010 by Joseph Woolley, Steffen Konerow, Jared White  & J. Max Wilson
    @license http://www.jaxonproject.org/bsd_license.txt BSD License
*/

/*
Class: jaxon.callback

The global callback object which is active for every request.
*/
jaxon.callback = jaxon.ajax.callback.create();

/*
Class: jaxon
*/

/*
Function: jaxon.request

Initiates a request to the server.
*/
jaxon.request = jaxon.ajax.request.execute;

/*
Object: jaxon.response

The response queue that holds response commands, once received
from the server, until they are processed.
*/
jaxon.response = jaxon.tools.queue.create(jaxon.config.responseQueueSize);

/*
Function: jaxon.register

Registers a new command handler.
Shortcut to <jaxon.ajax.handler.register>
*/
jaxon.register = jaxon.ajax.handler.register;

/*
Function: jaxon.$

Shortcut to <jaxon.tools.dom.$>.
*/
jaxon.$ = jaxon.tools.dom.$;

/*
Function: jaxon.getFormValues

Shortcut to <jaxon.tools.form.getValues>.
*/
jaxon.getFormValues = jaxon.tools.form.getValues;

/*
Object: jaxon.msg

Prints various types of messages on the user screen.
*/
jaxon.msg = jaxon.ajax.message;

/*
Object: jaxon.js

Shortcut to <jaxon.cmd.script>.
*/
jaxon.js = jaxon.cmd.script;

/*
Boolean: jaxon.isLoaded

true - jaxon module is loaded.
*/
jaxon.isLoaded = true;

/*
Class: jaxon.command

This class is defined for compatibility with previous versions,
since its functions are used in other packages.
*/
jaxon.command = {};

/*
Class: jaxon.command.handler
*/
jaxon.command.handler = {};

/*
Function: jaxon.command.handler.register

Registers a new command handler.
*/
jaxon.command.handler.register = jaxon.ajax.handler.register;

/*
Function: jaxon.command.create

Creates a new command (object) that will be populated with
command parameters and eventually passed to the command handler.
*/
jaxon.command.create = function(sequence, request, context) {
    var newCmd = {};
    newCmd.cmd = '*';
    newCmd.fullName = '* unknown command name *';
    newCmd.sequence = sequence;
    newCmd.request = request;
    newCmd.context = context;
    return newCmd;
};

/*
Class: jxn

Contains shortcut's to frequently used functions.
*/
var jxn = {};

/*
Function: jxn.$

Shortcut to <jaxon.tools.dom.$>.
*/
jxn.$ = jaxon.tools.dom.$;

/*
Function: jxn.getFormValues

Shortcut to <jaxon.tools.form.getValues>.
*/
jxn.getFormValues = jaxon.tools.form.getValues;

jxn.request = jaxon.request;
