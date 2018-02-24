<?php

namespace Classes;

use Classes\Contracts\NumbersInterface;

abstract class AbstractNumbers implements NumbersInterface
{
    protected $pad = 0;
    protected $numbersCount; // how many numbers have been found
    protected $numbersFound;

    /**
     * Primes constructor.
     * @param int $numbersCount The number of primes to find
     * @param bool $calculateOnInit Whether to calculate the primes during the class initialization
     * @throws \Exception
     */
    public function __construct(int $numbersCount = 10, $calculateOnInit = true)
    {
        $this->numbersCount = $numbersCount;

        if ($calculateOnInit) {
            $this->findNumbers();
        }
    }

    public function getNumbersFound(): array
    {
        return $this->numbersFound;
    }

    public function getPadding(): int
    {
        return $this->pad;
    }

    /**
     * Find the length of digits of the maximum prime number we found
     * @param array $numbersFound
     */
    public function calculatePadding(array $numbersFound)
    {
        $max = max($numbersFound);
        $this->pad = strlen((string)(pow($max, 2)));
    }

    abstract function findNumbers();
    abstract function setNumbersCount(int $num);
}