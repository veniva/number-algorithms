<?php

namespace Classes;

use Classes\Contracts\PrimeNumberInterface;

class Primes extends AbstractNumbers implements PrimeNumberInterface
{
    protected $numbersFound = [2];

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
}