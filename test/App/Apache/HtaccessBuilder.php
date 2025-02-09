<?php

require __DIR__ . '/../../config.php';

$builder = new \Nemundo\App\Apache\Builder\HtaccessBuilder();
$builder->path = (new \Nemundo\Project\Path\TmpPath())->getPath();

$builder->buildFile();


