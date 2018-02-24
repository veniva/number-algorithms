<?php

namespace Tests\Output\Table;

use Classes\Contracts\NumbersInterface;
use Classes\Output\Table;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class MethodApplyPaddingTest extends TestCase
{
    /**
     * @var Table
     */
    protected $table;

    /**
     * @var NumbersInterface|MockObject
     */
    protected $numbers;

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

    public function testPaddingApplied()
    {
        $this->numbers->method('getPadding')->willReturn(2);
        $number = $this->table->applyPadding(3);

        $this->assertTrue($number === ' 3');
    }

}