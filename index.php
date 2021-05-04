<?php


require 'buttons.html';
require ("./vendor/autoload.php");

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\BrowserConsoleHandler;

$buttonName = $_GET['type'];
$inputMessage = $_GET['message'];

// create a log channel
$log = new Logger('name');
$log->pushHandler(new StreamHandler('path/to/your.log', Logger::ERROR));
$log->pushHandler(new StreamHandler('path/to/your.log', Logger::WARNING));

// add records to the log
//$log->warning('Foo');
//$log->error('Bar');

//////
///

// link with buttons.html
$buttonName = $_GET['type'];
$inputMessage = $_GET['message'];

// create and add log message in logs folder
switch ($buttonName) {
    case 'DEBUG': // 100
        $log = new Logger('DEBUG');
        $log->pushHandler(new StreamHandler(__DIR__ . '/Logs/debug.log', Logger::DEBUG)); // links to Logger.php
        $log->pushHandler(new BrowserConsoleHandler());
        $log->debug($inputMessage);
        break;

    case 'INFO': // 200
        $log = new Logger('INFO');
        $log->pushHandler(new StreamHandler(__DIR__ . '/Logs/info.log', Logger::INFO));
        $log->info($inputMessage);
        break;

    case 'NOTICE': // 250
        $log = new Logger('NOTICE');
        $log->pushHandler(new StreamHandler(__DIR__ . '/Logs/notice.log', Logger::NOTICE));
        $log->notice($inputMessage);
        break;

    case 'WARNING': // 300
        $log = new Logger('WARNING');
        $log->pushHandler(new StreamHandler(__DIR__ . '/Logs/warning.log', Logger::WARNING));
        $log->warning($inputMessage);
        break;

    case 'ERROR': // 400
        $log = new Logger('ERROR');
        $log->pushHandler(new StreamHandler(__DIR__ . '/Logs/error.log', Logger::ERROR));
        $log->error($inputMessage);
        break;

    case 'CRITICAL': // 500
        $log = new Logger('CRITICAL');
        $log->pushHandler(new StreamHandler(__DIR__ . '/Logs/critical.log', Logger::CRITICAL));
        $log->critical($inputMessage);
        break;

    case 'ALERT': // 550
        $log = new Logger('ALERT');
        $log->pushHandler(new StreamHandler(__DIR__ . '/Logs/alert.log', Logger::ALERT));
        $log->alert($inputMessage);
        break;

    case 'EMERGENCY': // 600
        $log = new Logger('EMERGENCY');
        $log->pushHandler(new StreamHandler(__DIR__ . '/Logs/emergency.log', Logger::EMERGENCY));
        $log->alert($inputMessage);
        break;
}
