<?php

// Get the components
$rqCalc = rq(App\Calculator\Calc::class);
$rqCalcFunc = rq(App\Calculator\CalcFunc::class);
$rqResult = rq(App\Calculator\Result::class);
// Get the values in the HTML fields.
$operator = je('operator')->rd()->select();
$operandA = je('operand-a')->rd()->input();
$operandB = je('operand-b')->rd()->input();
?>
<form>
    <div class="row mb-3">
        <div class="col-md-4">
            <button type="button" class="btn btn-primary w-100"
                <?= attr()->click($rqCalc->render()) ?>>Clear</button>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" id="operand-a" />
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">
            <select class="form-select" id="operator">
                <option value="addition">+</option>
                <option value="subtraction">-</option>
                <option value="multiplication">*</option>
                <option value="division">/</option>
            </select>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" id="operand-b" />
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">
            <button type="button" class="btn btn-primary w-100"
                <?= attr()->click($rqCalcFunc->calculate($operator, $operandA, $operandB)) ?>>=</button>
        </div>
        <div class="col-md-8" <?= attr()->bind($rqResult) ?>>
        </div>
    </div>
</form>
