<?php
namespace Nemundo\Admin\AppDesigner\Data\AppExternalUserType;
class AppExternalUserTypeDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var AppExternalUserTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppExternalUserTypeModel();
}
}