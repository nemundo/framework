<?php
namespace Nemundo\Admin\AppDesigner\Data\AppTextType;
use Nemundo\Model\Id\AbstractModelIdValue;
class AppTextTypeId extends AbstractModelIdValue {
/**
* @var AppTextTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppTextTypeModel();
}
}