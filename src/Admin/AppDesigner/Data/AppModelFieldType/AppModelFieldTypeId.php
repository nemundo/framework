<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelFieldType;
use Nemundo\Model\Id\AbstractModelIdValue;
class AppModelFieldTypeId extends AbstractModelIdValue {
/**
* @var AppModelFieldTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelFieldTypeModel();
}
}