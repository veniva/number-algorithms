<?php

namespace Classes\Factories;

use Classes\Contracts\NumbersInterface;
use Classes\Fibonacci;
use Classes\Primes;

/**
 * Choose which class implementing NumbersInterface to create based on the user input on the console
 * Class NumbersFactoryMethod
 * @package Classes\Factories
 */
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
            case 2:
                $class = new Fibonacci($numbersCount);
                break;
        }

        return $class;
    }
}