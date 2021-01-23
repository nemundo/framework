<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelDefaultType;
class AppModelDefaultTypeDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var AppModelDefaultTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelDefaultTypeModel();
}
}