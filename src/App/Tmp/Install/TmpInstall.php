<?php
namespace Nemundo\App\Tmp\Install;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Tmp\Data\TmpModelCollection;
use Nemundo\App\Tmp\Application\TmpApplication;
use Nemundo\App\Application\Setup\ApplicationSetup;
class TmpInstall extends AbstractInstall {
public function install() {
(new ModelCollectionSetup())->addCollection(new TmpModelCollection());
}
}