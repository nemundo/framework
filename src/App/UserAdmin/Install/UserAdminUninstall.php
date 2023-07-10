<?php
namespace Nemundo\App\UserAdmin\Install;
use Nemundo\App\Application\Type\Install\AbstractUninstall;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\UserAdmin\Data\UserAdminModelCollection;
use Nemundo\App\UserAdmin\Application\UserAdminApplication;
use Nemundo\App\Application\Setup\ApplicationSetup;
class UserAdminUninstall extends AbstractUninstall {
public function uninstall() {
(new ModelCollectionSetup())->removeCollection(new UserAdminModelCollection());
}
}