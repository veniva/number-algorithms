<?php

namespace Classes;


class Init
{
    static $numbersCount;
    static $opCode;
    static $outputMethod;

    public static function checkInput(array $argv)
    {
        for($i = 1; $i < count($argv); $i++) {
            if (isset($argv[$i]) && !is_numeric($argv[$i])) {
                return $i;
            }
        }
        return 0;
    }

    public static function calculateParameters (array $argv)
    {
        self::$numbersCount = $argv[1] ?? 10; // either 10 or the first argument passed to the terminal after the script name
        self::$opCode = $argv[2] ?? 1; // operation code - 1 prime numbers;

        self::$outputMethod = $argv[3] ?? 1; // where to write the output - 1 console; 2 file
        if (self::$numbersCount > 300) { // do not use console for large numbers
            self::$outputMethod = 2;
        }
    }
}