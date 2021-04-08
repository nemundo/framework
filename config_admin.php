<?php

require __DIR__ . "/config.php";

$project = new \Nemundo\FrameworkProject();


(new \Nemundo\App\ModelDesigner\ModelDesignerConfig())->addProject($project);
\Nemundo\Com\Html\Header\LibraryHeader::$documentTitle = $project->project;

\Nemundo\Admin\Controller\AdminController::addAdminSite(new \NemundoTest\TestSite());
\Nemundo\Admin\Controller\AdminController::addAdminSite(new \NemundoTest\Package\Bootstrap\Form\BootstrapFormTestSite());