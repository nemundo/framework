<?php
namespace Nemundo\App\WebService\Data\Key;
class KeyDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var KeyModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new KeyModel();
}
}