<?php

require __DIR__ . '/../../config.php';


$loop = new \Nemundo\Core\Structure\ForLoop();
$loop->minNumber = 100;
$loop->maxNumber = 101;
foreach ($loop->getData() as $n) {
    $cmd = new \Nemundo\App\Linux\Local\MkDirLocal();
    //$cmd->path = 'c:\\tmp\\hello' . $n;
    $cmd->path = 'c:/tmp/hello' . $n;
    $cmd->runCommand();
}

