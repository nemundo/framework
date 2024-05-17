<?php
namespace Nemundo\App\WebService\Data\Key;
class KeyBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var KeyModel
*/
protected $model;

/**
* @var string
*/
public $key;

public function __construct() {
parent::__construct();
$this->model = new KeyModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->key, $this->key);
$id = parent::save();
return $id;
}
}