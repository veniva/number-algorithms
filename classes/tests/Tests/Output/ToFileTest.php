<?php

namespace Tests\Output;

use Classes\Contracts\NumbersInterface;
use Classes\Output\ToFile;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class ToFileTest extends TestCase
{
    /**
     * @var ToFile|MockObject
     */
    protected $toFile;

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

        $this->toFile = $this->getMockBuilder(ToFile::class)
            ->setConstructorArgs([$this->numbers])
            ->setMethods(['fOpen', 'fWrite', 'makeTHead', 'makeTBody'])
            ->getMock();
    }

    public function testMakeTHeadCalled()
    {
        $this->toFile->expects($this->once())->method('makeTHead');
        $this->toFile->getTHead();
    }

    public function testMakeTBodyCalled()
    {
        $this->toFile->expects($this->once())->method('makeTBody');
        $this->toFile->getTBody();
    }

    public function testToMediumCallsFWrite()
    {
        $this->toFile->expects($this->once())->method('fWrite')->with('abc');
        $this->toFile->toMedium('abc');
    }
}
