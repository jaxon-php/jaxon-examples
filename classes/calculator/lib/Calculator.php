<?php

namespace Service\Calculator;

use Exception;

class Calculator
{
    /**
     * @var array
     */
    private array $operators = ['addition', 'subtraction', 'multiplication', 'division'];

    /**
     * @param string $operator
     * @param string $operandA
     * @param string $operandB
     *
     * @return mixed
     */
    public function calculate(string $operator, string $operandA, string $operandB): mixed
    {
        if(!in_array($operator, $this->operators))
        {
            throw new Exception("$operator is not a valid operator.");
        }
        if($operandA === '' || $operandB === '')
        {
            throw new Exception("The operands must not be empty.");
        }
        if(!is_numeric($operandA))
        {
            throw new Exception("$operandA is not a valid operand.");
        }
        if(!is_numeric($operandB))
        {
            throw new Exception("$operandB is not a valid operand.");
        }

        $operandA = intval($operandA);
        $operandB = intval($operandB);
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
