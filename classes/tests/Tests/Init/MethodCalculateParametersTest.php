<?php

namespace Tests\Init;

use Classes\Init;
use PHPUnit\Framework\TestCase;

class MethodCalculateParametersTest extends TestCase
{
    public function testNumbersCountDefault()
    {
        Init::calculateParameters(['script_name']);
        $this->assertSame(10, Init::$numbersCount);
    }

    public function testNumbersCountAssigned()
    {
        Init::calculateParameters(['script_name', 12]);
        $this->assertSame(12, Init::$numbersCount);
    }

    public function testOpCodeDefault()
    {
        Init::calculateParameters(['script_name']);
        $this->assertSame(1, Init::$opCode);
    }

    public function testOpCodeAssigned()
    {
        Init::calculateParameters(['script_name', 12, 2]);
        $this->assertSame(2, Init::$opCode);
    }

    public function testOutputMethodDefault()
    {
        Init::calculateParameters(['script_name']);
        $this->assertSame(1, Init::$outputMethod);
    }

    public function testOutputMethodAssigned()
    {
        Init::calculateParameters(['script_name', 12, 2, 2]);
        $this->assertSame(2, Init::$outputMethod);
    }

    public function testOutputMethodAutoAssigned()
    {
        Init::calculateParameters(['script_name', 301]);
        $this->assertSame(2, Init::$outputMethod);
    }

    public function testOutputMethodAutoAssignedWhenSpecified()
    {
        Init::calculateParameters(['script_name', 301, 1, 1]);
        $this->assertSame(2, Init::$outputMethod);
    }
}