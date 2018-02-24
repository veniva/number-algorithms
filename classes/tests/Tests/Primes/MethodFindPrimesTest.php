<?php

namespace Tests\Primes;

use Classes\Primes;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class MethodFindPrimesTest extends TestCase
{
    /**
     * @var MockObject|Primes
     */
    protected $primes = null;

    public function setUp()
    {
        $this->primes = $this->getMockBuilder(Primes::class)
            ->disableOriginalConstructor()
            ->setMethods(['isPrimeNumber', 'calculatePadding'])->getMock();
    }

    /**
     * @throws \Exception
     */
    public function testCalculatePaddingCalled()
    {
        $this->primes->method('isPrimeNumber')->willReturn(true);
        $this->primes->expects($this->once())->method('calculatePadding');
        $this->primes->findNumbers();
    }

    /**
     * @throws \Exception
     */
    public function testNumbersFoundArrayFilledIn()
    {
        $this->primes->method('isPrimeNumber')->willReturn(true);
        $this->primes->setNumbersCount(10);
        $this->primes->findNumbers();

        $this->assertTrue(count($this->primes->getNumbersFound()) === 10);
    }

    /**
     * @throws \Exception
     */
    public function testMethodIsPrimeNumberCalled()
    {
        $this->primes->setNumbersCount(10);
        $this->primes->method('isPrimeNumber')->willReturn(true);
        $this->primes->expects($this->exactly(9))->method('isPrimeNumber');

        $this->primes->findNumbers();
    }

    /**
     * @throws \Exception
     */
    public function testThrowsException()
    {
        $this->primes->method('isPrimeNumber')->willReturn(false);
        $this->expectException(\Exception::class);
        $this->primes->setNumbersCount(10);
        $this->primes->findNumbers();

    }
}
