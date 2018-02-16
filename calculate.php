<?php
require 'vendor/autoload.php';
$start = microtime(true);
if (isset($argv[1]) && !is_numeric($argv[1])) {
    exit('The parameter passed should be a number'.PHP_EOL);
}

$numOfPrimes = (int)$argv[1] ?? 10; // either 10 or the first argument passed to the terminal after the script name

try {
    $primes = new \Classes\PrimesConsole($numOfPrimes);

    // print the first row - the prime numbers
    echo $primes->firstRow();

    echo PHP_EOL;

    echo $primes->tableGrid();

    echo PHP_EOL;

} catch (Exception $e) {
    echo $e->getMessage().PHP_EOL;
}

echo 'Execution time: '.(microtime(true) - $start). ' sec';
echo PHP_EOL;