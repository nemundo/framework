<?php
namespace Nemundo\Admin\AppDesigner\Data\AppModel;
use Nemundo\Model\Id\AbstractModelIdValue;
class AppModelId extends AbstractModelIdValue {
/**
* @var AppModelModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppModelModel();
}
}