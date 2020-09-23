<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModelIndex;
use Nemundo\Model\Id\AbstractModelIdValue;
class AppModelIndexId extends AbstractModelIdValue {
/**
* @var AppModelIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelIndexModel();
}
}