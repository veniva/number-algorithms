<?php

namespace Tests\PrimesConsole;

use Classes\PrimesConsole;
use PHPUnit\Framework\TestCase;

class MethodTableGridTest extends TestCase
{
    protected $primesConsole;

    public function setUp()
    {
        $this->primesConsole = $this->getMockBuilder(PrimesConsole::class)
            ->disableOriginalConstructor()
            ->setMethods(null)
            ->getMock();
    }

    public function testReturnIsString()
    {
        $grid = $this->primesConsole->tableGrid();

        $this->assertTrue(is_string($grid));
    }

    public function testReturnedString()
    {
        $row = $this->primesConsole->tableGrid();

        $this->assertTrue($row === '4 '.PHP_EOL);
    }

    public function testReturnedString2()
    {
        $this->primesConsole->setNumOfPrimes(2);
        $this->primesConsole->findPrimes();

        $row = $this->primesConsole->tableGrid();

        $this->assertTrue($row === '4 6 '.PHP_EOL.'6 9 '.PHP_EOL);
    }
}