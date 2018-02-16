# Prime numbers table

## Description
This is a console application that prints out a multiplication table of the first 10 prime numbers. It can be also called to print out an arbitrary number of prime numbers.  
  
The first row prints out the prime numbers.
  
The following rows represent the multiplication table - each cell contains the product of the primes for the corresponding row and column.  

## Algorithm efficiency

The program implements the "Trial division" computational method as described in [Wikipedia](https://en.wikipedia.org/wiki/Prime_number#Trial_division). This method is good for testing small numbers, but if used with large numbers the number of tests that it performs grows exponentially which makes it slow and inefficient. 
  
## Requirements
PHP 7.1+

## Installation & Runing of the application
The sections below contain CLI commands that require that you have scrolled to the directory of the project and you have the `php` available as a command in the CLI

## Installation
Run the following command: 
 
 `php composer.phar install`
  
## Run the program
The following commands ara available:  
  
`php calculate.php` - prints a multiplication table of the first 10 prime numbers  
`php calculate.php N` - prints a multiplication table of the first N prime numbers, where N is a number

## Run the Unit tests

`php vendor/bin/phpunit`