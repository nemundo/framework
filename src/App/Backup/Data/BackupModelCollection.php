<?php
namespace Nemundo\App\Backup\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class BackupModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\App\Backup\Data\Backup\BackupModel());
}
}