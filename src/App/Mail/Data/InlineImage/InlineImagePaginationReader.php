<?php
namespace Nemundo\App\Mail\Data\InlineImage;
class InlineImagePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var InlineImageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new InlineImageModel();
}
/**
* @return InlineImageRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new InlineImageRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}