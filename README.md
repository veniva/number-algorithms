# Numbers sequence multiplication table 
## Primes & Fibonacci

## Description
This is a console application that prints out a multiplication table of number sequence calculated by different algorithms. 
Currently if implements the prime numbers and fibonacci numbers algorithms.  
  
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

## Installation
Use either Option 1 or Option 2  
### Option 1 - CLI
This option requires that you have scrolled to the directory of the project on the CLI and you have the php7.1+ available as `php` command in the CLI  
Run the following command: 
 
 `php composer.phar install`
 
### Option 2 - Docker
This option requires that you have installed Docker on your system  
Run the following commands: 
  
`docker-compose up --no-start`  
`docker start num-algs`  
`docker exec -it num-algs bash` - this will open a bash terminal on the running container
  
## Run the program
The following commands ara available on the CLI:  
  
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

## Notes
If you run a command that saves the output in a file, you can see the result in file `data/numbers-calculated.txt`.
