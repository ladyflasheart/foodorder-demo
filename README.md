# README

This is **NOT** an actual application. It was created in order to demonstrate
concepts being presented in an academy talk on autoloading in PHP. It has
been made available purely for reference by those who attended the talk
if they want to take another look.


The commits have been tagged at various points that I referred to in the
talk. Once you have cloned the repository you can navigate to the different
tagged versions used in the talk with `git checkout v1`, `git checkout v2`
etc.


### Tags

* __v1 Basic Code Files__ . App not working - fatal errors as can't
find "Class Order" being referred to on line 10 of index.php
`$order = new Order;`

* __v2 Added in all the require statements__. Got all the necessary
require statements at the top of index.php.

* __v3 Add clunky autoload function with spl_autoload_register__. Removed
the block of require statements at top of index.php and replaced it
with a very basic autoload function that looks for the files in two
hardcoded folders. Used spl_autoload_register to add that function
to the autoload queue.

* __v4 Added Composer and the Monolog package__. Our application files
are still being autoloaded with `my_clunky_autoloader` but we have
put in a new file `loggersetup.php` that instantiates an instance
of the Monolog Logger class (line 26 index.php). The Monolog Logger
is being autoloaded by Composer's autoloader which we have included
by requiring the `autoload.php` file generated by Composer (line 23
index.php). To see how Composer's autoloading is wired together take a look
at the following files:
  * foodorder/vendor/autoload.php
  * foodorder/vendor/composer/autoload_real.php (note call to spl_autoload_register)
  * foodorder/vendor/composer/autoload_psr4.php (generated from the information
  in the "autoload" configuration in foodorder/vendor/monolog/monolog/composer.json and
  foodorder/vendor/psr/log/composer.json
  * foodorder/vendor/composer/ClassLoader.php (implements the class loader)

* __v5 Using Composer Autoloading for our classes too__. We have
improved our application by adding namespaces to our files and setting
up a folder structure such that we can use PSR-4 autoloading with
Composer's autoloader. We have deleted `my_clunky_autoloader` from the
top of index.php. We have added our psr-4 autoloading configuration in the
"autoload" key in foodorder/composer.json and then run `composer dump-autoload`
to regenerate the composer autoload files. Take a look at the following
to see how composer has added this information so it can autoload
our files:
  * foodorder/vendor/composer/autoload_psr4.php

  Note: the autoload_classmap.php file is empty at this point as we are
  using composer's autoloading as we would in a development environment.
  To see how the autoload_classmap.php file is generated as it would be
  on a production server run `composer dump-autoload -o` on the command
  line at the root of your project (*this assumes you have composer installed
  globally on the relevant machine. See https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx
  for more information*).
  
  This last commit also does a bit of refactoring to use a factory to instantiate our objects.
