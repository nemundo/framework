<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelDefaultOrderType;
use Nemundo\Model\Id\AbstractModelIdValue;
class AppModelDefaultOrderTypeId extends AbstractModelIdValue {
/**
* @var AppModelDefaultOrderTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelDefaultOrderTypeModel();
}
}