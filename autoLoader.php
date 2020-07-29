<?php
declare(strict_types=1);

spl_autoload_register('autoLoader');

function autoLoader($className)
{
    $path = 'code/';
    $extension = '.php';
    $fullPath = $path . $className . $extension;

    if (!file_exists($fullPath)) {
        return false;
    }

    require_once $fullPath;
}