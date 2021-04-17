<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require 'vendor/autoload.php';
\Nemundo\Project\ProjectConfig::$projectPath = __DIR__ . DIRECTORY_SEPARATOR;


(new \Nemundo\Admin\Loader\AdminMySqlProjectLoader())->loadProject();

//(new \Nemundo\Project\Loader\MySqlProjectLoader())->loadProject();

//\Nemundo\Web\WebConfig::$webPath = \Nemundo\Project\ProjectConfig::$projectPath . 'admin' . DIRECTORY_SEPARATOR;

