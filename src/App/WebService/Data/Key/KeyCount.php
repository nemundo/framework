<?php
namespace Nemundo\App\WebService\Data\Key;
class KeyCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var KeyModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new KeyModel();
}
}