<?php
namespace Nemundo\Admin\AppDesigner\Data\AppPrefixAutoNumberType;
class AppPrefixAutoNumberTypeDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var AppPrefixAutoNumberTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppPrefixAutoNumberTypeModel();
}
}