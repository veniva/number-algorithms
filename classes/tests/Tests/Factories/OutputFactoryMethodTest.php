<?php

namespace Tests\Factories;

use Classes\Factories\NumbersFactoryMethod;
use Classes\Factories\OutputFactoryMethod;
use Classes\Output\ToConsole;
use Classes\Output\ToConsoleSequence;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class OutputFactoryMethodTest extends TestCase
{
    /**
     * @var OutputFactoryMethod|MockObject
     */
    protected $factory;

    protected function setUp()/* The :void return type declaration that should be here would cause a BC issue */
    {
        $this->factory = $this->getMockBuilder(OutputFactoryMethod::class)
            ->disableOriginalConstructor()
            ->setMethods(['newToFile'])
            ->getMock();
    }

    /**
     * @throws \Exception
     */
    public function testCreateToConsoleInstance()
    {
        $numbersCount = 10;
        $numbers = NumbersFactoryMethod::makeNumbers(1, $numbersCount);
        // output = 1 - to console;
        $outputClass = $this->factory->makeOutputClass($numbers, 1, $numbersCount);

        $this->assertInstanceOf(ToConsole::class, $outputClass);
    }

    /**
     * @throws \Exception
     */
    public function testCreateToConsoleSequenceInstance()
    {
        $numbersCount = 100;
        $numbers = NumbersFactoryMethod::makeNumbers(1, $numbersCount);
        // output = 1 - to console;
        $outputClass = $this->factory->makeOutputClass($numbers, 1, $numbersCount);

        $this->assertInstanceOf(ToConsoleSequence::class, $outputClass);
    }

    /**
     * @throws \Exception
     */
    public function testCreateToFileInstance()
    {
        $numbersCount = 100;
        $numbers = NumbersFactoryMethod::makeNumbers(1, $numbersCount);

        $this->factory->expects($this->once())->method('newToFile');

        // output = 2 - to file;
        $this->factory->makeOutputClass($numbers, 2, $numbersCount);
    }

    /**
     * Test that if the numbers to calculate is higher than 299 then the output will be written to file
     * despite the chosen opCode on the cli
     * @throws \Exception
     */
    public function testForceCreateToFileInstance()
    {
        $numbersCount = 300;
        $numbers = NumbersFactoryMethod::makeNumbers(1, $numbersCount);

        $this->factory->expects($this->once())->method('newToFile');

        // output chose in cli = 1 - to console;
        $this->factory->makeOutputClass($numbers, 1, $numbersCount);
    }

}