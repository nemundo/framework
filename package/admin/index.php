<?php

require 'config.php';

\Nemundo\Web\WebConfig::$webUrl = '/';

$site =new \Nemundo\App\Application\Site\AppSite();
$site->restricted=false;
\Nemundo\Admin\Controller\AdminController::addAdminSite($site);

$site = new \Nemundo\App\Application\Site\AdminSite();
$site->restricted=false;
\Nemundo\Admin\Controller\AdminController::addAdminSite($site);

\Nemundo\Admin\Controller\AdminController::addAdminSite(new \Nemundo\App\ModelDesigner\Site\ModelDesignerSite());
\Nemundo\Admin\Controller\AdminController::addAdminSite(new \Nemundo\App\ClassDesigner\Site\ClassDesignerSite());

(new \Nemundo\Admin\Web\AdminWeb())->loadWeb();
