<?php
namespace Nemundo\App\Translation\Data\Source;
class Source extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var SourceModel
*/
protected $model;

/**
* @var string
*/
public $sourceTypeId;

/**
* @var string
*/
public $source;

public function __construct() {
parent::__construct();
$this->model = new SourceModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->sourceTypeId, $this->sourceTypeId);
$this->typeValueList->setModelValue($this->model->source, $this->source);
$id = parent::save();
return $id;
}
}