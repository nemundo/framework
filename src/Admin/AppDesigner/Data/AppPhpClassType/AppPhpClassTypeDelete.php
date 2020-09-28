<?php
namespace Nemundo\Admin\AppDesigner\Data\AppPhpClassType;
class AppPhpClassTypeDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var AppPhpClassTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppPhpClassTypeModel();
}
}