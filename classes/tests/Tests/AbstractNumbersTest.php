<?php

namespace Tests;

use Classes\AbstractNumbers;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class AbstractNumbersTest extends TestCase
{
    /**
     * @var MockObject|AbstractNumbers
     */
    protected $numbers;

    public function setUp()
    {
        $this->numbers = $this->getMockBuilder(AbstractNumbers::class)
            ->disableOriginalConstructor()
            ->setMethods(['findNumbers', 'setNumbersCount'])
            ->getMock();
    }

    public function testCorrectPadding()
    {
        $this->numbers->calculatePadding([2]);
        $this->assertTrue($this->numbers->getPadding() === 1); // 2 * 2 = 4
    }

    public function testCorrectPadding2()
    {
        $this->numbers->calculatePadding([3, 44]);
        $this->assertTrue($this->numbers->getPadding() === 4); // 44 * 44 = 1936
    }

    public function testGetPaddingMethod()
    {
        $padding = $this->numbers->getPadding();
        $this->assertSame(0, $padding);
    }
}