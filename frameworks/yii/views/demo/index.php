<script type='text/javascript'>
    /* <![CDATA[ */
    window.onload = function() {
        // call the helloWorld function to populate the div on load
        Jaxon.App.Test.Pgw.sayHello(0);
        // call the setColor function on load
        Jaxon.App.Test.Pgw.setColor(jaxon.$('colorselect1').value);
        // Call the HelloWorld class to populate the 2nd div
        Jaxon.App.Test.Bts.sayHello(0);
        // call the HelloWorld->setColor() method on load
        Jaxon.App.Test.Bts.setColor(jaxon.$('colorselect2').value);
    }
    /* ]]> */
</script>
                        <div style="margin:10px;" id="div1">
                            &nbsp;
                        </div>
                        <div class="medium-4 columns">
                            <select class="form-control" id="colorselect1" name="colorselect1"
                                    onchange="Jaxon.App.Test.Pgw.setColor(jaxon.$('colorselect1').value); return false;">
                                <option value="black" selected="selected">Black</option>
                                <option value="red">Red</option>
                                <option value="green">Green</option>
                                <option value="blue">Blue</option>
                            </select>
                        </div>
                        <div class="medium-8 columns">
                            <button class="button radius" onclick='Jaxon.App.Test.Pgw.sayHello(0); return false;' >Click Me</button>
                            <button class="button radius" onclick='Jaxon.App.Test.Pgw.sayHello(1); return false;' >CLICK ME</button>
                            <button class="button radius" onclick="Jaxon.App.Test.Pgw.showDialog(); return false;" >PgwModal Dialog</button>
                        </div>

                        <div style="margin:10px;" id="div2">
                            &nbsp;
                        </div>
                        <div class="medium-4 columns">
                            <select class="form-control" id="colorselect2" name="colorselect2"
                                    onchange="Jaxon.App.Test.Bts.setColor(jaxon.$('colorselect2').value); return false;">
                                <option value="black" selected="selected">Black</option>
                                <option value="red">Red</option>
                                <option value="green">Green</option>
                                <option value="blue">Blue</option>
                            </select>
                        </div>
                        <div class="medium-8 columns">
                            <button class="button radius" onclick="Jaxon.App.Test.Bts.sayHello(0); return false;" >Click Me</button>
                            <button class="button radius" onclick="Jaxon.App.Test.Bts.sayHello(1); return false;" >CLICK ME</button>
                            <button class="button radius" onclick="Jaxon.App.Test.Bts.showDialog(); return false;" >Bootstrap Dialog</button>
                        </div>
