<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelPrimaryIndexType;
use Nemundo\Model\Id\AbstractModelIdValue;
class AppModelPrimaryIndexTypeId extends AbstractModelIdValue {
/**
* @var AppModelPrimaryIndexTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelPrimaryIndexTypeModel();
}
}