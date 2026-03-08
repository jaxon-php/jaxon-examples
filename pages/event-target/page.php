<?php
use App\Test\Test as AppTest;
use App\Test\Buttons as AppButtons;
use Ext\Test\Test as ExtTest;
use Ext\Test\Buttons as ExtButtons;
?>
                <!-- Custom attribute: Multiple event handlers on child nodes, using dedicated divs. -->
                <div class="row" <?= attr()
                    ->select('.app-color-choice')->on('change',
                        rq(AppTest::class)->setColor(jq()->val()))
                    ->select('.ext-color-choice')->on('change',
                        rq(ExtTest::class)->setColor(jq()->val())) ?>>

                    <div class="col-md-12" <?= attr()->bind(rq(AppTest::class)) ?>>
                        Initial content : <?= cl(AppTest::class)->html() ?>
                    </div>
                    <div class="col-md-12">
                        <select class="form-control app-color-choice">
                            <option value="black" selected="selected">Black</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                        </select>
                    </div>
                    <div class="col-md-12 buttons" <?= attr()->bind(rq(AppButtons::class)) ?>>
                    </div>

                    <div class="col-md-12" <?= attr()->bind(rq(ExtTest::class)) ?>>
                        Initial content : <?= attr()->html(rq(ExtTest::class)) ?>
                    </div>
                    <div class="col-md-12">
                        <select class="form-control ext-color-choice">
                            <option value="black" selected="selected">Black</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                        </select>
                    </div>
                    <div class="col-md-12 buttons" <?= attr()->bind(rq(ExtButtons::class)) ?>>
                    </div>
                </div>
