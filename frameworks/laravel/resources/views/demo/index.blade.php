@include( 'demo.includes.header' )

    <div class="container-fluid">
        <div class="row">
@include( 'demo.includes.nav', compact($menuEntries) )
            <div class="col-sm-9 content">
                <h3 class="page-header">Hello World Function</h3>

                <div class="row" id="jaxon-html">
                        <div class="col-md-12" id="div1">
                            &nbsp;
                        </div>
                        <div class="col-md-4 margin-vert-10">
                            <select class="form-control" id="colorselect1" name="colorselect1"
                                    onchange="Jaxon.App.Test.Pgw.setColor(jaxon.$('colorselect1').value); return false;">
                                <option value="black" selected="selected">Black</option>
                                <option value="red">Red</option>
                                <option value="green">Green</option>
                                <option value="blue">Blue</option>
                            </select>
                        </div>
                        <div class="col-md-8 margin-vert-10">
                            <button type="button" class="btn btn-primary" onclick='Jaxon.App.Test.Pgw.sayHello(1); return false;' >CLICK ME</button>
                            <button type="button" class="btn btn-primary" onclick='Jaxon.App.Test.Pgw.sayHello(0); return false;' >Click Me</button>
                            <button type="button" class="btn btn-primary" onclick="Jaxon.App.Test.Pgw.showDialog(); return false;" >PgwModal Dialog</button>
                        </div>

                        <div class="col-md-12" id="div2">
                            &nbsp;
                        </div>
                        <div class="col-md-4 margin-vert-10">
                            <select class="form-control" id="colorselect2" name="colorselect2"
                                    onchange="Jaxon.App.Test.Bts.setColor(jaxon.$('colorselect2').value); return false;">
                                <option value="black" selected="selected">Black</option>
                                <option value="red">Red</option>
                                <option value="green">Green</option>
                                <option value="blue">Blue</option>
                            </select>
                        </div>
                        <div class="col-md-8 margin-vert-10">
                            <button type="button" class="btn btn-primary" onclick="Jaxon.App.Test.Bts.sayHello(1); return false;" >CLICK ME</button>
                            <button type="button" class="btn btn-primary" onclick="Jaxon.App.Test.Bts.sayHello(0); return false;" >Click Me</button>
                            <button type="button" class="btn btn-primary" onclick="Jaxon.App.Test.Bts.showDialog(); return false;" >Bootstrap Dialog</button>
                        </div>

                </div>
            </div> <!-- class="content" -->
       </div> <!-- class="row" -->
    </div>
<div id="jaxon-init">
<script type='text/javascript'>
    /* <![CDATA[ */
    window.onload = function() {
        // call the helloWorld function to populate the div on load
        Jaxon.App.Test.Pgw.sayHello(0, false);
        // call the setColor function on load
        Jaxon.App.Test.Pgw.setColor(jaxon.$('colorselect1').value, false);
        // Call the HelloWorld class to populate the 2nd div
        Jaxon.App.Test.Bts.sayHello(0, false);
        // call the HelloWorld->setColor() method on load
        Jaxon.App.Test.Bts.setColor(jaxon.$('colorselect2').value, false);
    }
    /* ]]> */
</script>
</div>

@include( 'demo.includes.footer', compact($jaxonJs, $jaxonScript, $jaxonCss) )
