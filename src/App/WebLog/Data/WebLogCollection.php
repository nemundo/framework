<?php
namespace Nemundo\App\WebLog\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class WebLogCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\App\WebLog\Data\WebLog\WebLogModel());
}
}