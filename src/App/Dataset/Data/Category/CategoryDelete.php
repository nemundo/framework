<?php
namespace Nemundo\App\Dataset\Data\Category;
class CategoryDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var CategoryModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CategoryModel();
}
}