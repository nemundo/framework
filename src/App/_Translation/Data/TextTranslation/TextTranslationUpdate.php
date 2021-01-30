<?php
namespace Nemundo\App\Translation\Data\TextTranslation;
use Nemundo\Model\Data\AbstractModelUpdate;
class TextTranslationUpdate extends AbstractModelUpdate {
/**
* @var TextTranslationModel
*/
public $model;

/**
* @var string
*/
public $languageId;

/**
* @var string
*/
public $text;

/**
* @var string
*/
public $sourceId;

public function __construct() {
parent::__construct();
$this->model = new TextTranslationModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->languageId, $this->languageId);
$this->typeValueList->setModelValue($this->model->text, $this->text);
$this->typeValueList->setModelValue($this->model->sourceId, $this->sourceId);
parent::update();
}
}