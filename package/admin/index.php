<?php

require 'config.php';

\Nemundo\Web\WebConfig::$webUrl = '/';
\Nemundo\Model\ModelConfig::$dataUrl =\Nemundo\Web\WebConfig::$webUrl.'data/';


// Problem Setup!!!
\Nemundo\Web\WebConfig::$webPath = \Nemundo\Project\ProjectConfig::$projectPath . 'admin' . DIRECTORY_SEPARATOR;
\Nemundo\Model\ModelConfig::$redirectDataPath= \Nemundo\Project\ProjectConfig::$projectPath . 'admin' . DIRECTORY_SEPARATOR. 'data_redirect' . DIRECTORY_SEPARATOR;
\Nemundo\Model\ModelConfig::$dataPath= \Nemundo\Project\ProjectConfig::$projectPath . 'admin' . DIRECTORY_SEPARATOR. 'data' . DIRECTORY_SEPARATOR;



$site =new \Nemundo\App\Application\Site\AppSite();
$site->restricted=false;
\Nemundo\Admin\Controller\AdminController::addAdminSite($site);

$site = new \Nemundo\App\Application\Site\AdminSite();
$site->restricted=false;
\Nemundo\Admin\Controller\AdminController::addAdminSite($site);

\Nemundo\Admin\Controller\AdminController::addAdminSite(new \Nemundo\App\ModelDesigner\Site\ModelDesignerSite());
\Nemundo\Admin\Controller\AdminController::addAdminSite(new \Nemundo\App\ClassDesigner\Site\ClassDesignerSite());


\Nemundo\Admin\Controller\AdminController::addAdminSite(new \Nemundo\App\UserAction\Site\UserActionSite());

\Nemundo\Admin\Controller\AdminController::addAdminSite(new \Nemundo\App\UserAction\Site\LoginSite());


(new \Nemundo\Admin\Web\AdminWeb())->loadWeb();
