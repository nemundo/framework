<?php
namespace Nemundo\App\Mail\Data\InlineImage;
use Nemundo\Model\Id\AbstractModelIdValue;
class InlineImageId extends AbstractModelIdValue {
/**
* @var InlineImageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new InlineImageModel();
}
}