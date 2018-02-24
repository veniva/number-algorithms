# Numbers sequence multiplication table 
## Primes & Fibonacci

## Description
This is a console application that prints out a multiplication table of number sequence calculated by different algorithms. 
Currently if implements the prime numbers and fibonacci numbers algorithms. It can be also called to print out an arbitrary number of sequence numbers.  
  
The first row prints out the prime or fibonacci numbers.
  
The following rows represent the multiplication table - each cell contains the product of the numbers for the corresponding row and column.  

## Algorithms efficiency
### Prime numbers
The program implements the "Trial division" computational method as described in [Wikipedia](https://en.wikipedia.org/wiki/Prime_number#Trial_division). 
This method is good for testing small numbers, but if used with large numbers the number of tests that it performs grows exponentially O(2^n) which makes it slow and inefficient. 
### Fibonacci numbers
Implementing a dynamic programming method. It's relatively fast with time complexity O(n) which represents a linear growth,
## Requirements
PHP 7.1+

## Installation & Runing of the application
The sections below contain CLI commands that require that you have scrolled to the directory of the project and you have the `php` available as a command in the CLI

## Installation
Run the following command: 
 
 `php composer.phar install`
  
## Run the program
The following commands ara available:  
  
`php calculate.php [N] [O] [M]` - there are 3 optional parameters where:   
`N` is the number of numbers to be calculated (default is 10),  
`O` is the operation to be performed - 1 for prime numbers, 2 for Fibonacci numbers (default is 1)  
`M` is the medium where the tables will be printed - 1 print to Console, 2 store in a file located in the `./data` folder (default is 1)  
  
Examples:   
`php calculate.php 12` - prints a multiplication table of the first 12 prime numbers  
`php calculate.php 20 2` - prints a multiplication table of the first 20 fibonacci numbers  
`php calculate.php 20 2 2` - stores in file a multiplication table of the first 20 fibonacci numbers

## Run the Unit tests

`php vendor/bin/phpunit`