<?php
namespace Nemundo\App\Translation\Data\LargeTextTranslation;
use Nemundo\Model\Data\AbstractModelUpdate;
class LargeTextTranslationUpdate extends AbstractModelUpdate {
/**
* @var LargeTextTranslationModel
*/
public $model;

/**
* @var string
*/
public $languageId;

/**
* @var string
*/
public $sourceId;

/**
* @var string
*/
public $largeText;

public function __construct() {
parent::__construct();
$this->model = new LargeTextTranslationModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->languageId, $this->languageId);
$this->typeValueList->setModelValue($this->model->sourceId, $this->sourceId);
$this->typeValueList->setModelValue($this->model->largeText, $this->largeText);
parent::update();
}
}