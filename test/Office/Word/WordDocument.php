<?php

require __DIR__ . '/../../config.php';


$wordDocument = new \Nemundo\Office\Word\Document\WordDocument();
$wordDocument->filename = (new \Nemundo\Project\Path\TmpPath())
    ->addPath('test.docx')
    //->addPath('test.odt')
    ->getFullFilename();

//$wordDocument->addText("Hello World</w:t><w:br/><w:t>Hello World\nHello World\nHello World\n");


$wordDocument
    ->addTable()
    ->addTableRow()
    ->setBold(true)
    ->addTableCell('Col 1',true,14)
    ->addTableCell('Col 1',true,14)
    ->addTableCell('Col 1',true,14)
    ->addTableRow()
    ->setBold(false)
    ->addTableCell('Col 2')
    ->addTableCell('Col 2')
    ->addTableCell('Col 2');


$wordDocument->addImageLeft('C:\test\guidle\98.jpg', 30);
//$wordDocument->addImageRight('C:\test\guidle\98.jpg');


$wordDocument->setFont('Times New Romand');
//$wordDocument->addText('Hello Word');*/

$loop = new \Nemundo\Core\Structure\ForLoop();
$loop->minNumber = 1;
$loop->maxNumber = 10;
foreach ($loop->getData() as $number) {
    $wordDocument->addText($number);  //->add newLine();
    //$wordDocument->addText($number)->newLine();
}


$wordDocument->setFont(\Nemundo\Office\Word\Document\WordFont::ARIAL);


$loop = new \Nemundo\Core\Structure\ForLoop();
$loop->minNumber = 1;
$loop->maxNumber = 10;
foreach ($loop->getData() as $number) {
    $wordDocument->addTextBlock($number);
}


/*
$wordDocument->addText('Hello Word', true);

$wordDocument->setFontSize(40);
$wordDocument->setFont('Tahoma');
$wordDocument->addText('Hello World');*/

$wordDocument->writeFile();
