<?php
namespace Nemundo\App\Translation\Data\SourceType;
class SourceTypePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var SourceTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SourceTypeModel();
}
/**
* @return SourceTypeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new SourceTypeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}