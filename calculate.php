<?php

use Classes\Factories\NumbersFactoryMethod;
use Classes\Factories\OutputFactoryMethod;
use Classes\Init;

require 'vendor/autoload.php';
$start = microtime(true);

/* Input Arguments
 eg. usages:
 "php ./calculate.php 12"       - will calculate 12 prime numbers and will output the content to the console
 "php ./calculate.php 10 1 1"   - will calculate 10 prime numbers and will write the table to the console
 "php ./calculate.php 10 1 2"   - will calculate 10 prime numbers and will write the table in a file
 "php ./calculate.php 300 1 1"  - will calculate 300 prime numbers and will write the table in a file regardless of third param
*/

if(($code = Init::checkInput($argv)) > 0) {
    exit("The parameter number $code should be a number".PHP_EOL);
}

Init::calculateParameters($argv);

$operation = null;
$output = null;
$outputFactory = new OutputFactoryMethod();

try {
    $operation = NumbersFactoryMethod::makeNumbers((int)Init::$opCode, (int)Init::$numbersCount);
    $output = $outputFactory->makeOutput($operation, (int)Init::$outputMethod, (int)Init::$numbersCount);

} catch(\Exception $e) {
    echo $e->getMessage().PHP_EOL;
}

echo $output->getTHead();
echo $output->getTBody();



echo 'Execution time: '.(microtime(true) - $start). ' sec';
echo PHP_EOL;
echo "Memory peak: ".(memory_get_peak_usage(true)/1024/1024)." MiB\n\n";
echo PHP_EOL;