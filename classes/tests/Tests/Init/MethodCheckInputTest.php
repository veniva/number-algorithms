<?php

namespace Tests\Init;

use Classes\Init;
use PHPUnit\Framework\TestCase;

class MethodCheckInputTest extends TestCase
{
    public function testFirstArgIsNumeric()
    {
        $code = Init::checkInput(['file_name', 1]);

        $this->assertTrue($code === 0);
    }

    public function testFirstArgIsNotNumeric()
    {
        $code = Init::checkInput(['file_name', 'a']);

        $this->assertSame(1, $code);
    }

    public function testSecondArgIsNumeric()
    {
        $code = Init::checkInput(['file_name', 1, 1]);

        $this->assertSame(0, $code);
    }

    public function testSecondArgIsNotNumeric()
    {
        $code = Init::checkInput(['file_name', 1, 'a']);

        $this->assertSame(2, $code);
    }
}