<?php

namespace Classes\Contracts;

interface PrimesInterface
{
    function findPrimes();
    function calculatePadding(array $primesFound);
    function isPrimeNumber(int $n, array $smallerPrimes): bool;
    function setNumOfPrimes(int $num);
    function getPrimesFound(): array;
    function getPadding(): int;
}