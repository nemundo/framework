<?php
namespace Nemundo\Admin\AppDesigner\Data\AppAutoNumberType;
use Nemundo\Model\Id\AbstractModelIdValue;
class AppAutoNumberTypeId extends AbstractModelIdValue {
/**
* @var AppAutoNumberTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppAutoNumberTypeModel();
}
}