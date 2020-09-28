<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelFieldType;
class AppModelFieldTypeDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var AppModelFieldTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelFieldTypeModel();
}
}