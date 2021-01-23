<?php
namespace Nemundo\Admin\AppDesigner\Data\AppImageType;
use Nemundo\Model\Id\AbstractModelIdValue;
class AppImageTypeId extends AbstractModelIdValue {
/**
* @var AppImageTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppImageTypeModel();
}
}