<?php
namespace Nemundo\App\Inbox\Install;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Inbox\Data\InboxModelCollection;
use Nemundo\App\Inbox\Application\InboxApplication;
use Nemundo\App\Application\Setup\ApplicationSetup;
class InboxInstall extends AbstractInstall {
public function install() {
(new ModelCollectionSetup())->addCollection(new InboxModelCollection());
}
}