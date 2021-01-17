<?php
namespace Nemundo\App\Translation\Data\Language;
use Nemundo\Model\Data\AbstractModelUpdate;
class LanguageUpdate extends AbstractModelUpdate {
/**
* @var LanguageModel
*/
public $model;

/**
* @var string
*/
public $code;

/**
* @var string
*/
public $language;

/**
* @var bool
*/
public $default;

public function __construct() {
parent::__construct();
$this->model = new LanguageModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->code, $this->code);
$this->typeValueList->setModelValue($this->model->language, $this->language);
$this->typeValueList->setModelValue($this->model->default, $this->default);
parent::update();
}
}