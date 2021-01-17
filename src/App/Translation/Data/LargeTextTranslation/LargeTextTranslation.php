<?php
namespace Nemundo\App\Translation\Data\LargeTextTranslation;
class LargeTextTranslation extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var LargeTextTranslationModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->languageId, $this->languageId);
$this->typeValueList->setModelValue($this->model->sourceId, $this->sourceId);
$this->typeValueList->setModelValue($this->model->largeText, $this->largeText);
$id = parent::save();
return $id;
}
}