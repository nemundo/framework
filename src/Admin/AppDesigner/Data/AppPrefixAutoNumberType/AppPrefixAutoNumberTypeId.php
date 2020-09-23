<?php
namespace Nemundo\Admin\AppDesigner\Data\AppPrefixAutoNumberType;
use Nemundo\Model\Id\AbstractModelIdValue;
class AppPrefixAutoNumberTypeId extends AbstractModelIdValue {
/**
* @var AppPrefixAutoNumberTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppPrefixAutoNumberTypeModel();
}
}