<?php
namespace Nemundo\App\Translation\Data\Source;
use Nemundo\Model\Data\AbstractModelUpdate;
class SourceUpdate extends AbstractModelUpdate {
/**
* @var SourceModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->sourceTypeId, $this->sourceTypeId);
$this->typeValueList->setModelValue($this->model->source, $this->source);
parent::update();
}
}