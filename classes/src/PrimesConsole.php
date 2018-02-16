<?php

namespace Classes;

use Classes\Contracts\OutInterface;

class PrimesConsole extends Primes implements OutInterface
{
    /**
     * @return string The first row to be printed in the console
     */
    public function firstRow(): string
    {
        return implode(' ', array_map(function($n) {
            return str_pad($n, $this->pad, " ", STR_PAD_LEFT);
        }, $this->getPrimesFound()));
    }

    /**
     * Formats the table rows ready to printed to the console
     * @return string
     */
    public function tableGrid(): string
    {
        $tableString = '';
        $primesFound = $this->getPrimesFound();

        foreach ($primesFound as $prime) { // col
            foreach ($primesFound as $multiplier) { // row
                $product = $prime * $multiplier;
                $tableString .= strlen((string)$product) < $this->pad ?
                    str_pad($product, $this->pad, " ", STR_PAD_LEFT) : $product;
                $tableString .= ' ';
            }
            $tableString .= PHP_EOL;
        }

        return $tableString;
    }
}