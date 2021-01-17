<?php
namespace Nemundo\App\Translation\Data\SourceType;
class SourceType extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var SourceTypeModel
*/
protected $model;

/**
* @var string
*/
public $sourceType;

public function __construct() {
parent::__construct();
$this->model = new SourceTypeModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->sourceType, $this->sourceType);
$id = parent::save();
return $id;
}
}