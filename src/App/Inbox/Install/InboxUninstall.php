<?php
namespace Nemundo\App\Inbox\Install;
use Nemundo\App\Application\Type\Install\AbstractUninstall;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Inbox\Data\InboxModelCollection;
use Nemundo\App\Inbox\Application\InboxApplication;
use Nemundo\App\Application\Setup\ApplicationSetup;
class InboxUninstall extends AbstractUninstall {
public function uninstall() {
(new ModelCollectionSetup())->removeCollection(new InboxModelCollection());
}
}