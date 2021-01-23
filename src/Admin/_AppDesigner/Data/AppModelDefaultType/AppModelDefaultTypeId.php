<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelDefaultType;
use Nemundo\Model\Id\AbstractModelIdValue;
class AppModelDefaultTypeId extends AbstractModelIdValue {
/**
* @var AppModelDefaultTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelDefaultTypeModel();
}
}