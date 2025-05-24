<?php

namespace App\Calculator;

use Exception;
use Jaxon\App\Dialog\DialogTrait;
use Jaxon\App\FuncComponent;
use Service\Calculator\Calculator;

class CalcFunc extends FuncComponent
{
    use DialogTrait;

    /**
     * @param Calculator $calculator
     */
    public function __construct(private Calculator $calculator)
    {}

    /**
     * @param string $operator
     * @param string $operandA
     * @param string $operandB
     *
     * @return void
     */
    public function calculate(string $operator, string $operandA, string $operandB): void
    {
        $operator = trim($operator);
        $operandA = trim($operandA);
        $operandB = trim($operandB);
        try
        {
            $result = $this->calculator->calculate($operator, $operandA, $operandB);
            // Share the result value with the other components.
            $this->stash()->set('calculator.operator', $operator);
            $this->stash()->set('calculator.result', $result);
            // Render the result component.
            $this->cl(Result::class)->render();
        }
        catch(Exception $e)
        {
            $this->alert()->title('Error!!!')->error($e->getMessage());
        }
    }
}
