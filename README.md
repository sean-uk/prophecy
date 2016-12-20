# What's this??

An small example of mocking in unit tests using the [Prophecy](https://github.com/phpspec/prophecy) framework.
The same code is covered by both [phpspec](http://www.phpspec.net/en/stable/manual/getting-started.html) tests
and [phpunit](https://phpunit.de/manual/5.7/en/installation.html) test cases.

Prophecy was created as part of the phpspec and is already integrated into it.
[Prophecy is also compatible with PHPUnit](https://phpunit.de/manual/5.7/en/test-doubles.html#test-doubles.prophecy).

## Usage

cd into this folder and run `composer install`, then

* to run phpspec: `./vendor/bin/phpspec run`
* to run phpunit: `./vendor/bin/phpunit phpunit/`

(phpunit test cases are in the `phpunit/` folder and phpspec's are in `spec/`)