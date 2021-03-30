<?php

require __DIR__ . '/../config.php';

$configFile=new \Nemundo\Project\Config\ProjectConfigFile();
$configFile->setValue('cache_path','c:/test');
$configFile->writeFile();

