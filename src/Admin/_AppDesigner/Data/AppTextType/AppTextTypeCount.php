<?php
namespace Nemundo\Admin\AppDesigner\Data\AppTextType;
class AppTextTypeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var AppTextTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppTextTypeModel();
}
}