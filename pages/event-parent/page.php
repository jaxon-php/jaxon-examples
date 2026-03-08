<?php
use App\Test\Test as AppTest;
use App\Test\Buttons as AppButtons;
use Ext\Test\Test as ExtTest;
use Ext\Test\Buttons as ExtButtons;
?>
                <div class="row">
                    <div class="col-md-12" <?= attr()->bind(rq(AppTest::class)) ?>>
                        Initial content : <?= cl(AppTest::class)->html() ?>
                    </div>
                    <!-- Custom attribute: Event handler on child nodes, using a selector. -->
                    <div class="col-md-12" <?= attr()->select('.color-choice')
                        ->on('change', rq(AppTest::class)->setColor(jq()->val())) ?>>
                        <select class="form-control color-choice">
                            <option value="black" selected="selected">Black</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                        </select>
                    </div>
                    <div class="col-md-12 buttons" <?= attr()->bind(rq(AppButtons::class)) ?>>
                    </div>

                    <div class="col-md-12" <?= attr()->bind(rq(ExtTest::class)) ?>>
                        Initial content : <?= cl(ExtTest::class)->html() ?>
                    </div>
                    <!-- Custom attribute: Event handler on child nodes, using a selector. -->
                    <div class="col-md-12" <?= attr()->select('.color-choice')
                            ->on('change', rq(ExtTest::class)->setColor(jq()->val())) ?>>
                        <select class="form-control color-choice">
                            <option value="black" selected="selected">Black</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                        </select>
                    </div>
                    <div class="col-md-12 buttons" <?= attr()->bind(rq(ExtButtons::class)) ?>>
                    </div>
                </div>
