<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelFieldType;
class AppModelFieldTypeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var AppModelFieldTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelFieldTypeModel();
}
}