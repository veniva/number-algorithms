<?php

namespace Tests\Output\Table;

use Classes\Contracts\NumbersInterface;
use Classes\Output\Table;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class MethodMakeTBodyTest extends TestCase
{
    /**
     * @var MockObject
     */
    protected $numbers;

    /**
     * @var MockObject
     */
    protected $table;

    /**
     * @throws \ReflectionException
     */
    protected function setUp()/* The :void return type declaration that should be here would cause a BC issue */
    {
        $this->numbers = $this->createMock(NumbersInterface::class);
        $this->table = $this->getMockBuilder(Table::class)
            ->setConstructorArgs([$this->numbers])
            ->setMethods(['toMedium', 'getTHead', 'getTBody'])
            ->getMock();
    }

    public function testNumbersIterated()
    {
        $this->numbers->method('getNumbersFound')->willReturn(range(1, 3));

        $this->table->expects($this->exactly(12))->method('toMedium');

        $this->table->makeTBody();
    }

    public function testCalledWithCorrectValues()
    {
        $this->numbers->method('getPadding')->willReturn(2);

        $this->numbers->method('getNumbersFound')->willReturn(range(3, 4));

        $this->table->expects($this->at(0))->method('toMedium')->with(' 9 ');
        $this->table->expects($this->at(1))->method('toMedium')->with('12 ');
        $this->table->expects($this->at(2))->method('toMedium')->with(PHP_EOL);
        $this->table->expects($this->at(3))->method('toMedium')->with('12 ');
        $this->table->expects($this->at(4))->method('toMedium')->with('16 ');
        $this->table->expects($this->at(5))->method('toMedium')->with(PHP_EOL);

        $this->table->makeTBody();
    }
}