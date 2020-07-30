<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

//spl_autoload_register('autoLoader');

function autoLoader($className)
{
    $path = 'blackjack/code/';
    $extension = '.php';
    $fullPath = $path . $className . $extension;

    if (file_exists($fullPath)) {
        require_once $fullPath;
        return true;
    } else {
        return false;
    }
}