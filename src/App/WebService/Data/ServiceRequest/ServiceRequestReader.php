<?php
namespace Nemundo\App\WebService\Data\ServiceRequest;
class ServiceRequestReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var ServiceRequestModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ServiceRequestModel();
}
/**
* @return ServiceRequestRow[]
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
* @return ServiceRequestRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return ServiceRequestRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new ServiceRequestRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}