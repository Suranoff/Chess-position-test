<?php

function autoload($className)
{
    $path = implode(DIRECTORY_SEPARATOR, [$_SERVER['DOCUMENT_ROOT'], 'App', str_replace('App\\', '', $className)]) . '.php';

    if (file_exists($path))
        include_once $path;
}

spl_autoload_register('autoload');