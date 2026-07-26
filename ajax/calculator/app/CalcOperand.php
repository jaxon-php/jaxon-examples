<?php

namespace App\Calculator;

use Exception;
use Jaxon\App\RequestParam;

use function intval;
use function is_numeric;
use function is_string;

class CalcOperand extends RequestParam
{
    /**
     * @var int
     */
    private int $value;

    /**
     * @param mixed $value
     *
     * @return void
     */
    public function set(mixed $value): void
    {
        if(!is_string($value))
        {
            throw new Exception("Incorrect type for the operand.");
        }
        if(!is_numeric($value))
        {
            throw new Exception("$value is not a valid operand, toto!!.");
        }
        $this->value = intval($value);
    }

    /**
     * @return int
     */
    public function value(): int
    {
        return $this->value;
    }
}
