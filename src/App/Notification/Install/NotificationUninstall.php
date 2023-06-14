<?php
namespace Nemundo\App\Notification\Install;
use Nemundo\App\Application\Type\Install\AbstractUninstall;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Notification\Data\NotificationModelCollection;
use Nemundo\App\Notification\Application\NotificationApplication;
use Nemundo\App\Application\Setup\ApplicationSetup;
class NotificationUninstall extends AbstractUninstall {
public function uninstall() {
(new ModelCollectionSetup())->removeCollection(new NotificationModelCollection());
}
}