<?php
namespace Nemundo\App\Application\Data\Project;
class ProjectReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var ProjectModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ProjectModel();
}
/**
* @return \Nemundo\App\Application\Row\ProjectCustomRow[]
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
* @return \Nemundo\App\Application\Row\ProjectCustomRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return \Nemundo\App\Application\Row\ProjectCustomRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new \Nemundo\App\Application\Row\ProjectCustomRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}