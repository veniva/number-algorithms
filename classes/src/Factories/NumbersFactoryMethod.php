<?php

namespace Classes\Factories;

use Classes\Contracts\NumbersInterface;
use Classes\Primes;

class NumbersFactoryMethod
{
    /**
     * @param int $opCode
     * @param int $numbersCount
     * @return NumbersInterface
     * @throws \Exception
     */
    public static function makeNumbers(int $opCode, int $numbersCount): NumbersInterface
    {
        $class = null;
        switch($opCode) {
            case 1:
                $class = new Primes($numbersCount);
                break;
        }

        return $class;
    }
}