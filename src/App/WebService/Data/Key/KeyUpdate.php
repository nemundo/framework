<?php
namespace Nemundo\App\WebService\Data\Key;
use Nemundo\Model\Data\AbstractModelUpdate;
class KeyUpdate extends AbstractModelUpdate {
/**
* @var KeyModel
*/
public $model;

/**
* @var string
*/
public $key;

public function __construct() {
parent::__construct();
$this->model = new KeyModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->key, $this->key);
parent::update();
}
}