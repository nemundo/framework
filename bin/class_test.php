<?php

require 'config.php';

$test = new \Nemundo\Dev\Test\PhpClassTest();
$test->checkProject(new \Nemundo\FrameworkProject());
