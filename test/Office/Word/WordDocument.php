<?php

use Nemundo\Core\Structure\ForLoop;
use Nemundo\Office\Word\Document\WordAlignment;

require __DIR__ . '/../../config.php';


$wordDocument = new \Nemundo\Office\Word\Document\WordDocument();


$wordDocument->setFontSize(20)->addText('Title');
$wordDocument->addText('Hello World');



$cell = new \Nemundo\Office\Word\Document\WordTableCell();
$cell->text = 'Hello1';
//$cell->fontSize = 20;
$cell->widthInMillimeter = 60;

/*$cell2 = new \Nemundo\Office\Word\Document\WordTableCell();
$cell2->text = 'Hello2';
$cell2->widthInMillimeter = 60;
$cell2->alignment = WordAlignment::RIGHT;*/


$wordDocument
    //->addTable(true)
    ->addTable(true, true);




$loop = new ForLoop();
$loop->minNumber = 1;
$loop->maxNumber = 10;

foreach ($loop->getData() as $number) {

    $wordDocument
        ->addTableRow()
        ->addTableCell('Test 1')
        ->addTableCell('Test 2')
        ->addWordTableCell($cell);
        //->addWordTableCell($cell2);*/

}

/*    ->addTableCell('Col 1', true, 14)
    ->addTableCell('Col 1', true, 14)
    ->addTableCell('Col 1', true, 14)
    ->addTableRow()
    ->addTableCell('Col 2')
    ->addTableCell('Col 2')
    ->addTableCell('Col 2');*/


/*
$wordDocument
    ->setUnderline(true)
    ->addText('Blablabla');



$wordDocument->addImageLeft('C:\test\guidle\98.jpg', 30);
//$wordDocument->addImageRight('C:\test\guidle\98.jpg');


$wordDocument->setFont('Times New Romand');
//$wordDocument->addText('Hello Word');*/

/*$loop = new \Nemundo\Core\Structure\ForLoop();
$loop->minNumber = 1;
$loop->maxNumber = 10;
foreach ($loop->getData() as $number) {
    $wordDocument->addText($number);
}


$wordDocument->setFont(\Nemundo\Office\Word\Document\WordFont::ARIAL);


$loop = new \Nemundo\Core\Structure\ForLoop();
$loop->minNumber = 1;
$loop->maxNumber = 10;
foreach ($loop->getData() as $number) {
    $wordDocument->addTextBlock($number);
}


$loop = new \Nemundo\Core\Structure\ForLoop();
$loop->minNumber = 1;
$loop->maxNumber = 10;
foreach ($loop->getData() as $number) {
    $wordDocument
        ->addText($number)
        ->addLine();
}


/*
$wordDocument->addText('Hello Word', true);

$wordDocument->setFontSize(40);
$wordDocument->setFont('Tahoma');
$wordDocument->addText('Hello World');*/


$wordDocument->format = \Nemundo\Office\Word\Document\WordFormat::OPEN_DOCUMENT_FORMAT;

$wordDocument->filename = (new \Nemundo\Project\Path\TmpPath())
    ->addPath('test.odt')
    ->getFullFilename();

$wordDocument->writeFile();


$wordDocument->format = \Nemundo\Office\Word\Document\WordFormat::WORD;

$wordDocument->filename = (new \Nemundo\Project\Path\TmpPath())
->addPath('test.docx')
    ->getFullFilename();

$wordDocument->writeFile();

