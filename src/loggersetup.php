<?php
/**
 * Set up the logger in a $log variable
 */

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$pathToLogFile = __DIR__ . '/../logs/error.log';

// create a log channel
$logger = new Logger('Foodorder ');
$logger->pushHandler(new StreamHandler($pathToLogFile, Logger::WARNING));
