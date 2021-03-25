<?php
namespace Nemundo\App\Linux\Install;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Linux\Data\LinuxModelCollection;
use Nemundo\App\Linux\Application\LinuxApplication;
use Nemundo\App\Application\Setup\ApplicationSetup;
class LinuxInstall extends AbstractInstall {
public function install() {
(new ApplicationSetup())->addApplication(new LinuxApplication());
(new ModelCollectionSetup())->addCollection(new LinuxModelCollection());
}
}