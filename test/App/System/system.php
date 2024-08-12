<?php

require __DIR__ . '/../../config.php';

(new \Nemundo\App\Linux\Cmd\DistributionVersionCmd())->getVersion();
