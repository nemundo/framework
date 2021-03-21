<?php

require __DIR__ . "/config.php";

(new \Nemundo\App\ModelDesigner\ModelDesignerConfig())->addProject(new \Nemundo\FrameworkProject());

/*
$site =new \Nemundo\App\Application\Site\AppSite();
$site->restricted=false;
\Nemundo\Admin\Controller\AdminController::addAdminSite($site);

$site = new \Nemundo\App\Application\Site\AdminSite();
$site->restricted=false;
\Nemundo\Admin\Controller\AdminController::addAdminSite($site);*/

//\Nemundo\Admin\Controller\AdminController::addAdminSite(new \Nemundo\App\MySql\Site\MySqlApplicationDataSite());
//\Nemundo\Admin\Controller\AdminController::addAdminSite(new \Nemundo\App\System\Site\SystemSite());
