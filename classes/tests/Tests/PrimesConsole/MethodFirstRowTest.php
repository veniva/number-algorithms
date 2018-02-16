<?php

namespace Tests\PrimesConsole;

use Classes\PrimesConsole;
use PHPUnit\Framework\TestCase;

class MethodFirstRowTest extends TestCase
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
        $row = $this->primesConsole->firstRow();

        $this->assertTrue(is_string($row));
    }

    public function testReturnedString()
    {
        $row = $this->primesConsole->firstRow();

        $this->assertTrue($row === '2');
    }

    public function testReturnedString2()
    {
        $this->primesConsole->setNumOfPrimes(3);
        $this->primesConsole->findPrimes();

        $row = $this->primesConsole->firstRow();

        $this->assertTrue($row === ' 2  3  5');
    }
}