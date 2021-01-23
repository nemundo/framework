<?php
namespace Nemundo\Admin\AppDesigner\Data\AppImageType;
class AppImageTypeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var AppImageTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppImageTypeModel();
}
}