<?php
require get_template_directory() . '/vendor/autoload.php';

$latte = new Latte\Engine;
$latte->setTempDirectory(get_template_directory() . '/views/temp');

// TODO: remove/comment out when finished
use Tracy\Debugger;
Debugger::enable();