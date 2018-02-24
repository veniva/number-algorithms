<?php

namespace Classes\Output;

use Classes\Contracts\NumbersInterface;

abstract class Table
{
    /**
     * @var NumbersInterface
     */
    protected $numbers;

    public function __construct(NumbersInterface $numbers)
    {
        $this->numbers = $numbers;
    }

        public function makeTHead()
    {
        $numbersFound = $this->numbers->getNumbersFound();

        foreach ($numbersFound as $number) {
            $num = $this->applyPadding($number).' ';
            $this->toMedium($num);
        }
        $this->toMedium(PHP_EOL);
    }

    public function makeTBody()
    {
        $primesFound = $this->numbers->getNumbersFound();

        foreach ($primesFound as $prime) { // col
            foreach ($primesFound as $multiplier) { // row
                $product = $prime * $multiplier;

                $number = $this->applyPadding($product);

                $this->toMedium($number.' ');
            }
            $this->toMedium(PHP_EOL);
        }
    }

    public function applyPadding($number): string
    {
        $number = (string)$number;
        return strlen($number) < $this->numbers->getPadding() ?
            str_pad($number, $this->numbers->getPadding(), " ", STR_PAD_LEFT) : $number;

    }

    abstract public function toMedium(string $str = null);
    abstract public function getTHead();
    abstract public function getTBody();
}