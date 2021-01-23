<?php
namespace Nemundo\Admin\AppDesigner\Data\AppTemplateModel;
class AppTemplatePaginationModelReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var AppTemplateModelModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppTemplateModelModel();
}
/**
* @return AppTemplateModelRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new AppTemplateModelRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}