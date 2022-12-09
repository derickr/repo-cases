<?php
require 'vendor/autoload.php';

DG\BypassFinals::enable();
DG\BypassFinals::setCacheDirectory(__DIR__ . '/cache');

class TrampolineTest {
    public function __call(string $name, array $arguments) {
        echo 'Trampoline for ', $name, PHP_EOL;
        return test(...$arguments);
    }
}
$o = new TrampolineTest();
$callback = [$o, 'trampoline'];

function shutdown_handler()
{
	include 'final-class.php';
	$f = new Finals();
}

register_shutdown_function('shutdown_handler');
