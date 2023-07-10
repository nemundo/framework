<?php
namespace Nemundo\App\UserAdmin\Install;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\UserAdmin\Data\UserAdminModelCollection;
use Nemundo\App\UserAdmin\Application\UserAdminApplication;
use Nemundo\App\Application\Setup\ApplicationSetup;
class UserAdminInstall extends AbstractInstall {
public function install() {
(new ModelCollectionSetup())->addCollection(new UserAdminModelCollection());
}
}