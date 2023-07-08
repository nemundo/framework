<?php
namespace Nemundo\App\Backup\Data\Backup;
class BackupReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var BackupModel
*/
public $model;

public function __construct() {
$this->model = new BackupModel();
parent::__construct();
}
/**
* @return BackupRow[]
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
* @return BackupRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return BackupRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new BackupRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}