<?php



use Nemundo\Dev\Install\AdminPackageInstall;

require  "config.php";

(new AdminPackageInstall())->install();
(new \Nemundo\App\ModelDesigner\Application\ModelDesignerApplication())->installApp();
