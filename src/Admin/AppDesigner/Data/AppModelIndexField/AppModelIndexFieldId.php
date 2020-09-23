<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndexField;
use Nemundo\Model\Id\AbstractModelIdValue;
class AppModelIndexFieldId extends AbstractModelIdValue {
/**
* @var AppModelIndexFieldModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelIndexFieldModel();
}
}