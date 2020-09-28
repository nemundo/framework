<?php
namespace Nemundo\Admin\AppDesigner\Data\App;
class AppValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var AppModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModel();
}
}