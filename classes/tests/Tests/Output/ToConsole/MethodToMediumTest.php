<?php
/**
 * User: ventsi
 * Date: 23.2.2018 г.
 * Time: 14:39 ч.
 */

namespace Tests\Output\ToConsole;

use Classes\Contracts\NumbersInterface;
use Classes\Output\ToConsole;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class MethodToMediumTest extends TestCase
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
     * @throws \ReflectionException
     */
    protected function setUp()/* The :void return type declaration that should be here would cause a BC issue */
    {
        $this->numbers = $this->createMock(NumbersInterface::class);
        $this->toConsole = $this->getMockBuilder(ToConsole::class)
            ->setConstructorArgs([$this->numbers])
            ->setMethods(null)
            ->getMock();
    }

    public function testToMediumReturnsString()
    {
        $this->toConsole->toMedium('abc');
        $this->toConsole->toMedium(' def');

        $this->assertTrue($this->toConsole->getStr() === 'abc def');
    }
}