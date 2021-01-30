<?php
namespace Nemundo\App\Translation\Data\SourceType;
class SourceTypeValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var SourceTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SourceTypeModel();
}
}