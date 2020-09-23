<?php
namespace Nemundo\Admin\AppDesigner\Data\AppImageResizeType;
use Nemundo\Model\Id\AbstractModelIdValue;
class AppImageResizeTypeId extends AbstractModelIdValue {
/**
* @var AppImageResizeTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new AppImageResizeTypeModel();
}
}