<?php

namespace Classes\Contracts;

interface PrimeNumberInterface
{
    function isPrimeNumber(int $n, array $smallerPrimes): bool;
}