<?php

namespace Tests\Factories;

use Classes\Factories\NumbersFactoryMethod;
use Classes\Fibonacci;
use Classes\Primes;
use PHPUnit\Framework\TestCase;

class NumbersFactoryMethodTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testReturnsPrimesInstance()
    {
        $numbers = NumbersFactoryMethod::makeNumbers(1, 10);

        $this->assertInstanceOf(Primes::class, $numbers);
    }

    /**
     * @throws \Exception
     */
    public function testReturnsFibonacciInstance()
    {
        $numbers = NumbersFactoryMethod::makeNumbers(2, 10);

        $this->assertInstanceOf(Fibonacci::class, $numbers);
    }
}