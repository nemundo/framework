<?php
namespace Nemundo\Admin\AppDesigner\Data\AppImageType;
class AppImageTypeDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var AppImageTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppImageTypeModel();
}
}