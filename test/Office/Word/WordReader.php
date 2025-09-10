<?php

require __DIR__ . '/../../config.php';

$filename = '';

$reader = new \Nemundo\Office\Word\Reader\WordReader();
$reader->filename = $filename;
(new \Nemundo\Core\Debug\Debug())->write($reader->getText());





