<?php
namespace Nemundo\App\UserAdmin\Application;
use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\App\UserAdmin\Data\UserAdminModelCollection;
use Nemundo\App\UserAdmin\Install\UserAdminInstall;
use Nemundo\App\UserAdmin\Install\UserAdminUninstall;
class UserAdminApplication extends AbstractApplication {
protected function loadApplication() {
$this->application = 'UserAdmin';
$this->applicationId = '88ae1e2d-9b6e-418f-9498-d3bfa891e59e';
$this->modelCollectionClass =  UserAdminModelCollection::class;
$this->installClass =  UserAdminInstall::class;
$this->uninstallClass = UserAdminUninstall::class;
}
}