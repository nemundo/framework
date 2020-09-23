<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelPrimaryIndexType;
class AppModelPrimaryIndexTypeDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var AppModelPrimaryIndexTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelPrimaryIndexTypeModel();
}
}