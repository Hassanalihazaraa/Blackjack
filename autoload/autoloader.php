<?php
declare(strict_types=1);

spl_autoload_register('autoLoader');

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