function testSyncRequests() {
    <?= rq('HelloWorld')->ssleep(5) ?>;
    <?= rq('HelloWorld')->sleep(6) ?>;
    <?= rq('HelloWorld')->sleep(1) ?>;
    <?= rq('HelloWorld')->sleep(2) ?>;

    <?= rq('HelloWorld')->ssleep(5) ?>;
    <?= rq('HelloWorld')->sleep(6) ?>;
    <?= rq('HelloWorld')->sleep(1) ?>;
    <?= rq('HelloWorld')->sleep(2) ?>;
}

function testNodupRequests() {
    <?= rq('HelloWorld')->nodup(5) ?>;
    <?= rq('HelloWorld')->nodup(1) ?>;
    setTimeout(function() {
        <?= rq('HelloWorld')->nodup(1) ?>;
    }, 3000);
    setTimeout(function() {
        <?= rq('HelloWorld')->nodup(1) ?>;
    }, 6000);
    <?= rq('HelloWorld')->nodup(1) ?>;
}

nodupCallbacks = {
    enableCall: true,
    onPrepare: function(oRequest) {
        if(nodupCallbacks.enableCall == false) {
            oRequest.ignore = true;
            console.log('Ignored request to HelloWorld.nodup');
            return;
        }
        nodupCallbacks.enableCall = false;
        console.log('Allowed request to HelloWorld.nodup');
        console.log('Disabled request to HelloWorld.nodup');
    },
    onComplete: function() {
        nodupCallbacks.enableCall = true;
        console.log('Enabled request to HelloWorld.nodup');
    }
}
