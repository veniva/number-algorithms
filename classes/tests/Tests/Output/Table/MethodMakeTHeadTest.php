<?php

namespace Tests\Output\Table;

use Classes\Contracts\NumbersInterface;
use Classes\Output\Table;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class MethodMakeTHeadTest extends TestCase
{
    /**
     * @var Table|MockObject
     */
    protected $table;
    /**
     * @var MockObject|NumbersInterface
     */
    protected $numbers;

    /**
     * @throws \Exception
     */
    protected function setUp()/* The :void return type declaration that should be here would cause a BC issue */
    {
        $this->numbers = $this->createMock(NumbersInterface::class);
        $this->table = $this->getMockBuilder(Table::class)
            ->setConstructorArgs([$this->numbers])
            ->setMethods(['toMedium', 'getTHead', 'getTBody'])
            ->getMock();
    }

    /**
     * Test that the numbers array is iterated
     */
    public function testNumbersIterated()
    {
        $this->numbers->method('getNumbersFound')->willReturn(range(1, 7));

        $this->table->expects($this->exactly(8))->method('toMedium');

        $this->table->makeTHead();
    }

    public function testCalledWithCorrectValues()
    {
        $this->numbers->method('getPadding')->willReturn(2);

        $this->numbers->method('getNumbersFound')->willReturn(range(9, 11));

        $this->table->expects($this->at(0))->method('toMedium')
        ->with(' 9 ');

        $this->table->expects($this->at(1))->method('toMedium')
            ->with('10 ');

        $this->table->expects($this->at(2))->method('toMedium')
            ->with('11 ');

        $this->table->makeTHead();
    }
}