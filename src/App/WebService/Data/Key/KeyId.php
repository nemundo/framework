<?php
namespace Nemundo\App\WebService\Data\Key;
use Nemundo\Model\Id\AbstractModelIdValue;
class KeyId extends AbstractModelIdValue {
/**
* @var KeyModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new KeyModel();
}
}