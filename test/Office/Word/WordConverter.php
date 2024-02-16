<?php

require __DIR__ . '/../../config.php';

$sourceFilename = 'C:\test\test.docx';
$destinationFilename = 'C:\test\test.xml';

(new \Nemundo\Office\Word\Reader\WordConverter())->convertToHtml($sourceFilename,$destinationFilename);
