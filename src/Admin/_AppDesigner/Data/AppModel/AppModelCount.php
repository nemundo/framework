<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModel;
class AppModelCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var AppModelModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelModel();
}
}