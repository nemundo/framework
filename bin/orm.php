<?php

require __DIR__ . '/../../../config_admin.php';

$script = new \Nemundo\App\ModelDesigner\Script\ModelDesignerOrmScript();
$script->deleteOrm = false;
$script->createOrm = true;
$script->run();
