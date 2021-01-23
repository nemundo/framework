<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelField;
class AppModelFieldCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var AppModelFieldModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelFieldModel();
}
}