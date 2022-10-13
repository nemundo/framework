<?php
namespace Nemundo\App\Dataset\Data\Category;
class CategoryValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var CategoryModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CategoryModel();
}
}