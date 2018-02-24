<?php

namespace Tests\Output\ToConsole;

use Classes\Contracts\NumbersInterface;
use Classes\Output\ToConsole;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class MethodGetTHeadTest extends TestCase
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
        $this->numbers = $this->createMock(NumbersInterface::class);
        $this->toConsole = $this->getMockBuilder(ToConsole::class)
            ->setConstructorArgs([$this->numbers])
            ->setMethods(['toMedium', 'makeTHead'])
            ->getMock();
    }

    public function testReturnIsString()
    {
        $row = $this->toConsole->getTHead();

        $this->assertTrue(is_string($row));
    }

    public function testMethodMakeTHeadCalled()
    {
        $this->toConsole->expects($this->once())->method('makeTHead');

        $this->toConsole->getTHead();
    }

    public function testStrNullified()
    {
        $this->numbers->method('getNumbersFound')->willReturn([1, 12]);

        $this->toConsole->getTHead();

        // call it second time with no numbers found in order to check if it returns empty string
        $this->numbers->method('getNumbersFound')->willReturn([]);
        $row = $this->toConsole->getTHead();

        $this->assertTrue($row === '');

    }
}