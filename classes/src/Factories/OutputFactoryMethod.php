<?php

namespace Classes\Factories;

use Classes\Contracts\NumbersInterface;
use Classes\Output\ToConsole;
use Classes\Output\ToConsoleSequence;
use Classes\Output\ToFile;

/**
 * Creates an output object of type Table
 * Class OutputFactoryMethod
 * @package Classes\Factories
 */
class OutputFactoryMethod
{
    /**
     * @param NumbersInterface $numbers
     * @param int $outputMethod
     * @param int $numbersCount
     * @return ToConsole|ToConsoleSequence|ToFile|null
     * @throws \Exception
     */
    public function makeOutput(NumbersInterface $numbers, int $outputMethod, int $numbersCount)
    {
        $output = null;
        switch($numbersCount < 300) { // if we have to calculate more than 300 numbers the write the output to file in all the cases

            case true:
                switch($outputMethod) {
                    case 1: // output to console
                        if ($numbersCount < 100) {
                            $output = new ToConsole($numbers); // faster but uses more memory
                        } else {
                            $output = new ToConsoleSequence($numbers); // slower - prints every number to the console immediately
                        }
                        break;

                    case 2: // write to file
                        $output = $this->newToFile($numbers);
                        break;
                }
                break;

            case false:
                $output = $this->newToFile($numbers);
                break;
        }


        return $output;
    }

    /**
     * @param $numbers
     * @return ToFile
     * @throws \Exception
     */
    public function newToFile($numbers): ToFile
    {
        return new ToFile($numbers);
    }
}