<?php

require __DIR__ . '/../../config.php';

$filename = 'C:\test\2-Tagesordnung 2024-02-26  N DFI.docx';

$reader = new \Nemundo\Office\Word\Reader\WordReader();
$reader->filename = $filename;
(new \Nemundo\Core\Debug\Debug())->write($reader->getText());





