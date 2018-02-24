<?php

namespace Tests\Factories;

use Classes\Contracts\NumbersInterface;
use Classes\Factories\NumbersFactoryMethod;
use PHPUnit\Framework\TestCase;

class NumbersFactoryMethodTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testReturnsPrimesInstance()
    {
        $numbers = NumbersFactoryMethod::makeNumbers(1, 10);

        $this->assertInstanceOf(NumbersInterface::class, $numbers);
    }
}