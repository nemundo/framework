<?php
namespace Nemundo\App\Tmp\Install;
use Nemundo\App\Application\Type\Install\AbstractUninstall;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Tmp\Data\TmpModelCollection;
use Nemundo\App\Tmp\Application\TmpApplication;
use Nemundo\App\Application\Setup\ApplicationSetup;
class TmpUninstall extends AbstractUninstall {
public function uninstall() {
(new ModelCollectionSetup())->removeCollection(new TmpModelCollection());
}
}