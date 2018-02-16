<?php
/**
 * User: ventsi
 * Date: 16.2.2018 г.
 * Time: 11:41 ч.
 */

namespace Tests\Primes;

use Classes\Primes;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class MethodCalculatePaddingTest extends TestCase
{
    /**
     * @var MockObject
     */
    protected $primes;

    public function setUp()
    {
        $this->primes = $this->getMockBuilder(Primes::class)
            ->disableOriginalConstructor()
            ->setMethods(null)
            ->getMock();
    }

    public function testCorrectPadding()
    {
        $this->primes->calculatePadding([2]);
        $this->assertTrue($this->primes->getPadding() === 1); // 2 * 2 = 4
    }

    public function testCorrectPadding2()
    {
        $this->primes->calculatePadding([3, 44]);
        $this->assertTrue($this->primes->getPadding() === 4); // 44 * 44 = 1936
    }
}