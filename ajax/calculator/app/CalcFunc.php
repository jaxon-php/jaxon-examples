<?php

namespace App\Calculator;

use Jaxon\App\FuncComponent;
use Service\Calculator\CalculatorService;
use Exception;

use function trim;

class CalcFunc extends FuncComponent
{
    /**
     * @param CalculatorService $calculator
     */
    public function __construct(private CalculatorService $calculator)
    {}

    /**
     * @param CalcOperation $operator
     * @param CalcOperand $operandA
     * @param CalcOperand $operandB
     *
     * @return void
     */
    public function calculate(CalcOperation $operator,
        CalcOperand $operandA, CalcOperand $operandB): void
    {
        try
        {
            $result = $this->calculator->calculate($operator->value(),
                $operandA->value(), $operandB->value());
            // Render the result component.
            $this->cl(Result::class)
                ->set('operator', $operator)
                ->set('result', $result)
                ->render();
        }
        catch(Exception $e)
        {
            $this->alert()->title('Error!!!')->error($e->getMessage());
        }
    }
}
