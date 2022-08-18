<?php
namespace Nemundo\App\WebService\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class WebServiceModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\App\WebService\Data\ServiceRequest\ServiceRequestModel());
}
}