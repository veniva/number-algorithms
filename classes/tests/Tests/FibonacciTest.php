<?php

namespace Tests;

use Classes\Fibonacci;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class FibonacciTest extends TestCase
{
    /**
     * @var Fibonacci|MockObject
     */
    protected $fibonacci;

    /**
     * @throws \Exception
     */
    protected function setUp()
    {
        $this->fibonacci = $this->getMockBuilder(Fibonacci::class)
            ->setConstructorArgs([10])
            ->setMethods(['calculatePadding'])
            ->getMock();
    }

    public function testFindNumbersAlgorithm()
    {
        $this->fibonacci->findNumbers();
        $this->assertSame([1, 1, 2, 3, 5, 8, 13, 21, 34, 55], $this->fibonacci->getNumbersFound());
    }

    public function testCalculatePaddingCalled()
    {
        $this->fibonacci->expects($this->once())->method('calculatePadding');
        $this->fibonacci->findNumbers();
    }
}