<?php
require 'vendor/autoload.php';

DG\BypassFinals::enable();
DG\BypassFinals::setCacheDirectory(__DIR__ . '/cache');

function shutdown_handler()
{
	include 'final-class.php';
	$f = new Finals();
}

register_shutdown_function('shutdown_handler');
