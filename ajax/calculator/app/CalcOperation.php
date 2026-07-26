<?php

namespace App\Calculator;

use Exception;
use Jaxon\App\RequestParam;

use function in_array;
use function is_string;
use function trim;

class CalcOperation extends RequestParam
{
    /**
     * @var array
     */
    private array $operators = ['addition', 'subtraction', 'multiplication', 'division'];

    /**
     * @var string
     */
    private string $value;

    /**
     * @param mixed $value
     *
     * @return void
     */
    public function set(mixed $value): void
    {
        if(!is_string($value))
        {
            throw new Exception("Incorrect type for the operation.");
        }
        if(!in_array(($value = trim($value)), $this->operators))
        {
            throw new Exception("$value is not a valid operator.");
        }
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->value;
    }
}
