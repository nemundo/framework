<?php

require __DIR__ . "/config.php";

$project = new \Nemundo\FrameworkProject();

(new \Nemundo\App\ModelDesigner\ModelDesignerConfig())->addProject($project);

//\Nemundo\Web\ResponseConfig::$title =  $project->project;
\Nemundo\Html\Header\LibraryHeader::$documentTitle = $project->project;




//\Nemundo\Admin\AdminConfig::$userMode = true;
//\Nemundo\Admin\AdminConfig::$pageTitle = $project->project;
