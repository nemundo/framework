<?php
namespace Nemundo\Admin\AppDesigner\Data\AppExternalUserType;
use Nemundo\Model\Id\AbstractModelIdValue;
class AppExternalUserTypeId extends AbstractModelIdValue {
/**
* @var AppExternalUserTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppExternalUserTypeModel();
}
}