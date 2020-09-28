<?php
namespace Nemundo\Admin\AppDesigner\Data\AppExternalType;
use Nemundo\Model\Id\AbstractModelIdValue;
class AppExternalTypeId extends AbstractModelIdValue {
/**
* @var AppExternalTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppExternalTypeModel();
}
}