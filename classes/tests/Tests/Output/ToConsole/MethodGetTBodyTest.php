<?php

namespace Tests\Output\ToConsole;

use Classes\Contracts\NumbersInterface;
use Classes\Output\ToConsole;
use Classes\Primes;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class MethodGetTBodyTest extends TestCase
{
    /**
     * @var NumbersInterface|MockObject
     */
    protected $numbers;

    /**
     * @var ToConsole|MockObject
     */
    protected $toConsole;

    /**
     * @throws \Exception
     */
    public function setUp()
    {
        $this->toConsole = new ToConsole(new Primes());
        $this->numbers = $this->createMock(NumbersInterface::class);
        $this->toConsole = $this->getMockBuilder(ToConsole::class)
            ->setConstructorArgs([$this->numbers])
            ->setMethods(['toMedium', 'makeTBody'])
            ->getMock();
    }

    public function testReturnIsString()
    {
        $str = $this->toConsole->getTBody();

        $this->assertTrue(is_string($str));
    }

    public function testMethodMakeTBodyCalled()
    {
        $this->toConsole->expects($this->once())->method('makeTBody');
        $this->toConsole->getTBody();
    }

    public function testStrNullified()
    {
        $this->numbers->method('getNumbersFound')->willReturn([9, 11]);
        $this->toConsole->getTBody();

        $this->numbers->method('getNumbersFound')->willReturn([]);
        $str = $this->toConsole->getTBody();

        $this->assertTrue($str === '');
    }
}