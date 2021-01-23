<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModel;
class AppModelDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var AppModelModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelModel();
}
}