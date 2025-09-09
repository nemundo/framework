<?php

require __DIR__ . '/../../config.php';


$wordDocument = new \Nemundo\Office\Word\Document\WordDocument();
$wordDocument->filename = (new \Nemundo\Project\Path\TmpPath())
    ->addPath('test.docx')
    //->addPath('test.odt')
    ->getFullFilename();



$cell = new \Nemundo\Office\Word\Document\WordTableCell();
$cell->text= 'Hello1';
$cell->widthInMillimeter = 60;




$wordDocument
    //->addTable(true)
    ->addTable(true)
    ->addTableRow()
    ->addWordTableCell($cell)
    ->addWordTableCell($cell);

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

$wordDocument->writeFile();
