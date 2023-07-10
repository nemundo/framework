<?php
namespace Nemundo\App\Backup\Data\Backup;
class BackupPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var BackupModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new BackupModel();
}
/**
* @return \Nemundo\App\Backup\Reader\BackupDataRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new \Nemundo\App\Backup\Reader\BackupDataRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}