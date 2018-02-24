<?php

namespace Classes\Contracts;

interface NumbersInterface
{
    function findNumbers();
    function setNumbersCount(int $num);
    function getNumbersFound(): array;
    function getPadding(): int;
}