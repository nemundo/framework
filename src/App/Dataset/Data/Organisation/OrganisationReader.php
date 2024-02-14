<?php
namespace Nemundo\App\Dataset\Data\Organisation;
class OrganisationReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var OrganisationModel
*/
public $model;

public function __construct() {
$this->model = new OrganisationModel();
parent::__construct();
}
/**
* @return OrganisationRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = $this->getModelRow($dataRow);
$list[] = $row;
}
return $list;
}
/**
* @return OrganisationRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return OrganisationRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new OrganisationRow($dataRow, $this->model, $this->multiLanguage);
$row->model = $this->model;
return $row;
}
}