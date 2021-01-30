<?php
namespace Nemundo\App\Translation\Data\LargeTextTranslation;
class LargeTextTranslationValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var LargeTextTranslationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LargeTextTranslationModel();
}
}