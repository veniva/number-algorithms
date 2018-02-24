<?php

namespace Tests\Output;

use Classes\Contracts\NumbersInterface;
use Classes\Output\ToConsoleSequence;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class ToConsoleSequenceTest extends TestCase
{
    /**
     * @var ToConsoleSequence|MockObject
     */
    protected $output;

    /**
     * @var NumbersInterface|MockObject
     */
    protected $numbers;

    /**
     * @throws \ReflectionException
     */
    protected function setUp()
    {
        $this->numbers = $this->createMock(NumbersInterface::class);

        $this->output = $this->getMockBuilder(ToConsoleSequence::class)
            ->setConstructorArgs([$this->numbers])
            ->setMethods(['makeTHead', 'makeTBody'])
            ->getMock();
    }

    public function testMakeTHeadCalled()
    {
        $this->output->expects($this->once())->method('makeTHead');
        $this->output->getTHead();
    }

    public function testMakeTBodyCalled()
    {
        $this->output->expects($this->once())->method('makeTBody');
        $this->output->getTBody();
    }

    public function testToMediumOutputsString()
    {
        $str = 'abc def';
        $this->expectOutputString($str);
        $this->output->toMedium($str);
    }
}
