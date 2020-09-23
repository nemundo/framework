<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndexType;
class AppModelIndexTypeDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var AppModelIndexTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelIndexTypeModel();
}
}