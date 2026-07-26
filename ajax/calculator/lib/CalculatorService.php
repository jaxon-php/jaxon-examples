<?php

namespace Service\Calculator;

use Exception;

class CalculatorService
{
    /**
     * @param string $operator
     * @param int $operandA
     * @param int $operandB
     *
     * @return int|float
     */
    public function calculate(string $operator, int $operandA, int $operandB): int|float
    {
        if($operator === 'division' && $operandB === 0)
        {
            throw new Exception("Division by 0 is not allowed.");
        }

        return match($operator) {
            'addition' => $operandA + $operandB,
            'subtraction' => $operandA - $operandB,
            'multiplication' => $operandA * $operandB,
            'division' => $operandA / $operandB,
        };
    }
}
