<?php
namespace Nemundo\App\Calendar\Data\Month;
class MonthPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var MonthModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MonthModel();
}
/**
* @return MonthRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new MonthRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}