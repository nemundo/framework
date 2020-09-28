<?php
namespace Nemundo\Admin\AppDesigner\Data\AppAutoNumberType;
class AppAutoNumberTypeDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var AppAutoNumberTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppAutoNumberTypeModel();
}
}