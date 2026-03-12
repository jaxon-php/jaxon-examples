<div class="row">
    <div class="col-md-12" id="hello-text-one">
        &nbsp;
    </div>
    <div class="col-md-4 select">
        <select class="form-select form-control" id="hello-color-one" name="hello-color-one"
                onchange="App.Test.Test.setColor(jaxon.$('hello-color-one').value); return false;">
            <option value="black" selected="selected">Black</option>
            <option value="red">Red</option>
            <option value="green">Green</option>
            <option value="blue">Blue</option>
        </select>
    </div>
    <div class="col-md-8 buttons">
        <button type="button" class="btn btn-primary" onclick='App.Test.Test.sayHello(1); return false;' >CLICK ME</button>
        <button type="button" class="btn btn-primary" onclick='App.Test.Test.sayHello(0); return false;' >Click Me</button>
        <button type="button" class="btn btn-primary" onclick="App.Test.Test.showDialog(); return false;" >Tingle Dialog</button>
    </div>

    <div class="col-md-12" id="hello-text-two">
        &nbsp;
    </div>
    <div class="col-md-4 select">
        <select class="form-select form-control" id="hello-color-two" name="hello-color-two"
                onchange="Ext.Test.Test.setColor(jaxon.$('hello-color-two').value); return false;">
            <option value="black" selected="selected">Black</option>
            <option value="red">Red</option>
            <option value="green">Green</option>
            <option value="blue">Blue</option>
        </select>
    </div>
    <div class="col-md-8 buttons">
        <button type="button" class="btn btn-primary" onclick="Ext.Test.Test.sayHello(1); return false;" >CLICK ME</button>
        <button type="button" class="btn btn-primary" onclick="Ext.Test.Test.sayHello(0); return false;" >Click Me</button>
        <button type="button" class="btn btn-primary" onclick="Ext.Test.Test.showDialog(); return false;" >Bootstrap Dialog</button>
    </div>
</div>
