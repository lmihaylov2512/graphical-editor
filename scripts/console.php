#!/usr/bin/php
<?php

if (php_sapi_name() !== 'cli') {
    exit('The script must be run only in console environment.');
}

require_once __DIR__ . '/../vendor/autoload.php';

use GraphicalEditor\{
    Image, Dispatcher
};
use GraphicalEditor\Exceptions\{
    InvalidCommandException, TerminateException
};

$image = new Image();
$dispatcher = new Dispatcher($image);

while (true) {
    echo '> ';
    $input = trim(fgets(STDIN));

    try {
        $dispatcher->dispatch($input)
            ->run();
    } catch (InvalidCommandException | InvalidArgumentException $e) {
        echo "{$e->getMessage()}\n";
    } catch (TerminateException $e) {
        break;
    }
}
