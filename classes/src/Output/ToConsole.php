<?php

namespace Classes\Output;

use Classes\Contracts\NumbersInterface;

/**
 * Class ToConsole - accumulate the output in 2 strings and send them to the console when the calculation is done.
 * Is fast but uses a lot of memory. Use with small number of calculations only.
 *
 * @package Classes\Output
 */
class ToConsole extends Table
{
    /**
     * @var NumbersInterface
     */
    protected $numbers;

    protected $str = '';

    public function __construct(NumbersInterface $numbers)
    {
        parent::__construct($numbers);
        $this->numbers = $numbers;
    }

    public function getTHead(): string
    {
        $this->str = '';
        $this->makeTHead();
        return $this->getStr();
    }

    public function getTBody(): string
    {
        $this->str = '';
        $this->makeTBody();
        return $this->getStr();
    }

    public function getNumberClass(): NumbersInterface
    {
        return $this->numbers;
    }

    public function toMedium(string $str = null)
    {
        $this->str .= $str;
    }

    public function getStr()
    {
        return $this->str;
    }
}