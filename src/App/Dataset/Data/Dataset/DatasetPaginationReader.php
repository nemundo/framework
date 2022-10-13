<?php
namespace Nemundo\App\Dataset\Data\Dataset;
class DatasetPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var DatasetModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DatasetModel();
}
/**
* @return DatasetRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new DatasetRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}