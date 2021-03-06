<?php

use JoopSchilder\React\Stream\NonBlockingInput\ReadableNonBlockingInputStream;
use React\EventLoop\Factory;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/demo_classes.php';

$input = new DemoNonBlockingInput();

$loop = Factory::create();
$stream = new ReadableNonBlockingInputStream($input, $loop);
$stream->on('data', fn() => print('m'));
$stream->on('error', fn() => print('e'));
$stream->on('close', fn() => print('c'));
$loop->addPeriodicTimer(0.2, fn() => print('.'));
$loop->run();
