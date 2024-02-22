<?php

require __DIR__ . '/../../config.php';

$sourceFilename = 'C:\test\programm.docx';
$destinationFilename = 'C:\test\test.html';

(new \Nemundo\Office\Word\Reader\WordConverter())->convertToHtml($sourceFilename,$destinationFilename);
