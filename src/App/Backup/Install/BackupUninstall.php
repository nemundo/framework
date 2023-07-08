<?php
namespace Nemundo\App\Backup\Install;
use Nemundo\App\Application\Type\Install\AbstractUninstall;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Backup\Data\BackupModelCollection;
use Nemundo\App\Backup\Application\BackupApplication;
use Nemundo\App\Application\Setup\ApplicationSetup;
class BackupUninstall extends AbstractUninstall {
public function uninstall() {
(new ModelCollectionSetup())->removeCollection(new BackupModelCollection());
}
}