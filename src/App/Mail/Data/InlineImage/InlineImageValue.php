<?php
namespace Nemundo\App\Mail\Data\InlineImage;
class InlineImageValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var InlineImageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new InlineImageModel();
}
}