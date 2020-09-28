<?php
namespace Nemundo\Admin\AppDesigner\Data\AppExternalUserType;
class AppExternalUserTypeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var AppExternalUserTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppExternalUserTypeModel();
}
}