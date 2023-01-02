<?php
namespace Nemundo\App\Calendar\Install;
use Nemundo\App\Application\Type\Install\AbstractUninstall;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Calendar\Data\CalendarModelCollection;
use Nemundo\App\Calendar\Application\CalendarApplication;
use Nemundo\App\Application\Setup\ApplicationSetup;
class CalendarUninstall extends AbstractUninstall {
public function uninstall() {
(new ModelCollectionSetup())->removeCollection(new CalendarModelCollection());
}
}