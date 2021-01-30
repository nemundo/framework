<?php
namespace Nemundo\App\Translation\Data\TextTranslation;
class TextTranslation extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var TextTranslationModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->languageId, $this->languageId);
$this->typeValueList->setModelValue($this->model->text, $this->text);
$this->typeValueList->setModelValue($this->model->sourceId, $this->sourceId);
$id = parent::save();
return $id;
}
}