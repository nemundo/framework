<?php
namespace Nemundo\App\Translation\Data\Language;
class LanguagePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var LanguageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LanguageModel();
}
/**
* @return LanguageRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new LanguageRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}