<?php
error_reporting(E_ALL);
require 'vendor/autoload.php';
\Nemundo\Project\ProjectConfig::$projectPath = __DIR__ . DIRECTORY_SEPARATOR;
(new \Nemundo\Project\Loader\MySqlProjectLoader())->loadProject();

\Nemundo\Web\WebConfig::$webPath = \Nemundo\Project\ProjectConfig::$projectPath . 'admin' . DIRECTORY_SEPARATOR;

