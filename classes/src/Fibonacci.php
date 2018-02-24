<?php

namespace Classes;

class Fibonacci extends AbstractNumbers
{
    protected $numbersFound = [1];

    function findNumbers()
    {
        for($i = 0; count($this->numbersFound) < $this->numbersCount; $i++) {
            $this->numbersFound[] = $this->numbersFound[$i] + ($this->numbersFound[$i-1] ?? 0);
        }

        $this->calculatePadding($this->numbersFound);
    }

    function setNumbersCount(int $num)
    {
        $this->numbersFound = [1];
        $this->numbersCount = $num;
    }
}