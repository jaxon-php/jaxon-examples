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
            // Render the result component.
            $this->cl(Result::class)->show($operator, $result);
        }
        catch(Exception $e)
        {
            $this->alert()->title('Error!!!')->error($e->getMessage());
        }
    }
}
