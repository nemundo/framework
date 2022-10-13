<?php
namespace Nemundo\App\Dataset\Data\Category;
class Category extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var CategoryModel
*/
protected $model;

/**
* @var string
*/
public $category;

public function __construct() {
parent::__construct();
$this->model = new CategoryModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->category, $this->category);
$id = parent::save();
return $id;
}
}