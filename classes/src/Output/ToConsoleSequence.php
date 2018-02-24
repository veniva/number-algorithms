<?php

namespace Classes\Output;

use Classes\Contracts\NumbersInterface;

class ToConsoleSequence extends Table
{
    
    public function __construct(NumbersInterface $numbers)
    {
        parent::__construct($numbers);
    }

    public function getTHead()
    {
        $this->makeTHead();
    }

    public function getTBody()
    {
        $this->makeTBody();
    }

    public function toMedium(string $str = null)
    {
        echo $str;
    }
}