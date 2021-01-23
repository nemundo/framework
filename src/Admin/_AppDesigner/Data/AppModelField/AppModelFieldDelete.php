<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelField;
class AppModelFieldDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var AppModelFieldModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelFieldModel();
}
}