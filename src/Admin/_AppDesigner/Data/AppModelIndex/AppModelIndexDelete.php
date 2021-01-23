<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndex;
class AppModelIndexDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var AppModelIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelIndexModel();
}
}