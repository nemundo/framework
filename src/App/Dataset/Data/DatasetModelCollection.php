<?php
namespace Nemundo\App\Dataset\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class DatasetModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\App\Dataset\Data\Category\CategoryModel());
$this->addModel(new \Nemundo\App\Dataset\Data\Dataset\DatasetModel());
$this->addModel(new \Nemundo\App\Dataset\Data\Organisation\OrganisationModel());
}
}