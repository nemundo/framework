<?php

require __DIR__ . '/../../config.php';


$wordDocument = new \Nemundo\Office\Word\Document\WordDocument();
$wordDocument->filename = (new \Nemundo\Project\Path\TmpPath())
    ->addPath('test.docx')
    ->getFullFilename();

$wordDocument->addText("Hello World</w:t><w:br/><w:t>Hello World\nHello World\nHello World\n");




/*
$wordDocument->setFont('Times New Romand');
$wordDocument->addText('Hello Word');*/

$loop = new \Nemundo\Core\Structure\ForLoop();
$loop->minNumber = 1;
$loop->maxNumber = 10;
foreach ($loop->getData() as $number) {
    $wordDocument->addText($number)->newLine();
    //$wordDocument->addText($number)->newLine();
}


/*
$wordDocument->addText('Hello Word', true);

$wordDocument->setFontSize(40);
$wordDocument->setFont('Tahoma');
$wordDocument->addText('Hello World');*/

$wordDocument->writeFile();
