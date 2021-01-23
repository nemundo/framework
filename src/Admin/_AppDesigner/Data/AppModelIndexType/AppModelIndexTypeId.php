<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndexType;
use Nemundo\Model\Id\AbstractModelIdValue;
class AppModelIndexTypeId extends AbstractModelIdValue {
/**
* @var AppModelIndexTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelIndexTypeModel();
}
}