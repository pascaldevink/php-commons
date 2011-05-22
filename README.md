PHP Commons
===========

This module wraps commonly used PHP functions so they can be used in a object oriented way.
This way they:
* have a better and more concise structure
* are easier to use
* are easier to read
* are easy to replace
* are easy to test
* are easy to mock

Plus, they sometimes combine multiple native functions to make life easier in general.

Installation
------------

PHP Commons will be available at pearhub shortly. Untill then, download it from github or do a:
> git submodule git://github.com/pascaldevink/php-commons.git

Usage
-----

For now, only StringUtils are (partially) implemented.
To use it, include it in your class:
> require_once 'nl\inpiggy\commons\lang\StringUtils.php

If you want, add a namespace reference:
> use nl\inpiggy\commons\lang\StringUtils

All methods are static, for easy access. To check for an empty string:
> StringUtils::isEmpty("")
will return true;

If a given variable is not a string, a NotAStringException will be thrown.
