<?php
/**
 * User: ventsi
 * Date: 16.2.2018 г.
 * Time: 11:11 ч.
 */

namespace Tests\Primes;

use Classes\Primes;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class MethodIsPrimeNumberTest extends TestCase
{
    /**
     * @var MockObject
     */
    protected $primes = null;

    public function setUp()
    {
        $this->primes = $this->getMockBuilder(Primes::class)
            ->disableOriginalConstructor()
            ->setMethods(null)
            ->getMock();
    }

    public function testPrimeNumber()
    {
        $smallerPrimes = [2, 3, 5];

        $isPrime = $this->primes->isPrimeNumber(7, $smallerPrimes);

        $this->assertTrue($isPrime);
    }

    public function testCompositeNumber()
    {
        $smallerPrimes = [2, 3, 5, 7];

        $isPrime = $this->primes->isPrimeNumber(8, $smallerPrimes);

        $this->assertTrue($isPrime === false);
    }

    public function testThrowException()
    {
        $smallerPrimes = [2, 3, 5, 7];
        $this->expectException(\Exception::class);

        $this->primes->isPrimeNumber(6, $smallerPrimes);
    }

    public function testThrowException2()
    {
        $smallerPrimes = [];
        $this->expectException(\Exception::class);

        $this->primes->isPrimeNumber(6, $smallerPrimes);
    }
}