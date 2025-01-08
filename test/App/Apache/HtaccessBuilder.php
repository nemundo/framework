<?php

require __DIR__ . '/../../config.php';

$builder = new \Nemundo\App\Apache\Builder\HtaccessBuilder();
$builder->path = (new \Nemundo\Project\Path\TmpPath())->getPath();

$filename = 'C:\test\regioklewenalp\regionklewenalp.xlsx';

$excel = new \Nemundo\Office\Excel\Reader\ExcelReader();
$excel->filename = $filename;

foreach ($excel->getData() as $excelRow) {

    $urlOld = $excelRow->getValue('Alte URL');
    $urlNew = $excelRow->getValue('Neue URL');
    (new \Nemundo\Core\Debug\Debug())->write($urlOld);

    if (($urlOld != null) && ($urlNew != null)) {

        $urlOld = (new \Nemundo\Core\Type\Text\Text($urlOld))->remove('https://www.regionklewenalp.ch')->getValue();
        $builder->addLine('RedirectPermanent ' . $urlOld . ' ' . $urlNew);  //->addLine('Redirect 301 /alte-url.html https://www.domain.de/neue-url.html');

        //$builder->addLine('RedirectPermanent /alte-url.html https://www.domain.de/neue-url.html');  //->addLine('Redirect 301 /alte-url.html https://www.domain.de/neue-url.html');

    }

}

$builder->buildFile();


