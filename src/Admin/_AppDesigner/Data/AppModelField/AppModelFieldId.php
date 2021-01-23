<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelField;
use Nemundo\Model\Id\AbstractModelIdValue;
class AppModelFieldId extends AbstractModelIdValue {
/**
* @var AppModelFieldModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelFieldModel();
}
}