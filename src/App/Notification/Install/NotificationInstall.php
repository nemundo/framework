<?php
namespace Nemundo\App\Notification\Install;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Notification\Data\NotificationModelCollection;
use Nemundo\App\Notification\Application\NotificationApplication;
use Nemundo\App\Application\Setup\ApplicationSetup;
class NotificationInstall extends AbstractInstall {
public function install() {
(new ModelCollectionSetup())->addCollection(new NotificationModelCollection());
}
}