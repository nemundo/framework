<?php

// Standalone
require __DIR__ . "/../vendor/autoload.php";
\Nemundo\Web\WebConfig::$webUrl = '/.../admin/';

// Project
require __DIR__ . "/../config.php";
require __DIR__ . "/../config_admin.php";

//(new \Nemundo\App\ModelDesigner\ModelDesignerConfig())->addProject();
