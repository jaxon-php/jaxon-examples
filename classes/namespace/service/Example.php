<?php

namespace Service;

class Example implements ExampleInterface
{
    public function message($isCaps)
    {
        return ($isCaps) ? 'HELLO WORLD!!!!' : 'Hello World!!!!';
    }

    public function color($name)
    {
        // TODO: check if this is a real color name
        return $name;
    }
}
