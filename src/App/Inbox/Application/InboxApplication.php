<?php
namespace Nemundo\App\Inbox\Application;
use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\App\Inbox\Data\InboxModelCollection;
use Nemundo\App\Inbox\Install\InboxInstall;
use Nemundo\App\Inbox\Install\InboxUninstall;
class InboxApplication extends AbstractApplication {
protected function loadApplication() {
$this->application = 'Inbox';
$this->applicationId = '56032e59-1e12-4dbc-a32b-6770985dcf1e';
$this->modelCollectionClass =  InboxModelCollection::class;
$this->installClass =  InboxInstall::class;
$this->uninstallClass = InboxUninstall::class;
}
}