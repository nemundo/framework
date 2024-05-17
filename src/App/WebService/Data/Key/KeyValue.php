<?php
namespace Nemundo\App\WebService\Data\Key;
class KeyValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var KeyModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new KeyModel();
}
}