<?php
namespace Nemundo\App\Mail\Data\InlineImage;
class InlineImageDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var InlineImageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new InlineImageModel();
}
}