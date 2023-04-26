<?php
namespace Nemundo\App\Mail\Data\InlineImage;
class InlineImageCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var InlineImageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new InlineImageModel();
}
}