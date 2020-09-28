<?php
namespace Nemundo\Admin\AppDesigner\Data\AppExternalType;
class AppExternalTypeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var AppExternalTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppExternalTypeModel();
}
}