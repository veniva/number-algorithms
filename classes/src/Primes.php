<?php

namespace Classes;

use Classes\Contracts\NumbersInterface;
use Classes\Contracts\PrimeNumberInterface;

class Primes implements NumbersInterface, PrimeNumberInterface
{
    protected $pad = 0;

    protected $numbersFound = [2];
    protected $numbersCount; // how many numbers have been found

    /**
     * Primes constructor.
     * @param int $numOfPrimes The number of primes to find
     * @param bool $calculateOnInit Whether to calculate the primes during the class initialization
     * @throws \Exception
     */
    public function __construct(int $numOfPrimes = 10, $calculateOnInit = true)
    {
        $this->numbersCount = $numOfPrimes;

        if ($calculateOnInit) {
            $this->findNumbers();
        }
    }

    /**
     * Find the given number ($this->numOfPrimes) of primes
     * Call the padding calculate method
     * @throws \Exception
     */
    public function findNumbers()
    {
        $n = 3;
        while (count($this->numbersFound) < $this->numbersCount) {
            if ($this->isPrimeNumber($n, $this->numbersFound)) {
                array_push($this->numbersFound, $n);
            }

            // protect against infinite loop in certain situations
            if ($n === 29 && count($this->numbersFound) !== 10) {
                throw new \Exception('Something strange is happening!');
            }

            $n++;
        }

        $this->calculatePadding($this->numbersFound);
    }

    /**
     * Find the length of digits of the maximum prime number we found
     * @param array $primesFound
     */
    public function calculatePadding(array $primesFound)
    {
        $max = max($primesFound);
        $this->pad = strlen((string)(pow($max, 2)));
    }

    /**
     * Find if a number is prime
     * Following the computational method described at:
     * https://en.wikipedia.org/wiki/Prime_number#Trial_division
     *
     * @param int $n The number to test
     * @param array $smallerPrimes The primes found up to that $n number
     * @return bool True - is prime, False - is composite
     * @throws \Exception
     */
    public function isPrimeNumber(int $n, array $smallerPrimes): bool {
        $maxDiv = floor(sqrt($n));
        $length = count($smallerPrimes);
        if (!$length || $smallerPrimes[$length-1] >= $n) {
            throw new \Exception('Wrong usage of isPrimeNumber method');
        }

        for($i = 0; $i < $length; $i++) {
            if ($smallerPrimes[$i] <= $maxDiv) {
                if ($n % $smallerPrimes[$i] === 0) {
                    return false;
                }
            } else {
                break;
            }
        }

        return true;
    }

    public function setNumbersCount(int $num)
    {
        $this->numbersFound = [2];
        $this->numbersCount = $num;
    }

    public function getNumbersFound(): array
    {
        return $this->numbersFound;
    }

    public function getPadding(): int
    {
        return $this->pad;
    }
}