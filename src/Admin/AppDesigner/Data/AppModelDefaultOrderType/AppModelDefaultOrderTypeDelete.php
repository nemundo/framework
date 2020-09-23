<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelDefaultOrderType;
class AppModelDefaultOrderTypeDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var AppModelDefaultOrderTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelDefaultOrderTypeModel();
}
}