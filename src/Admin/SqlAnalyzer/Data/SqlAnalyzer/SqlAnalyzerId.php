<?php
namespace Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzer;
use Nemundo\Model\Id\AbstractModelIdValue;
class SqlAnalyzerId extends AbstractModelIdValue {
/**
* @var SqlAnalyzerModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SqlAnalyzerModel();
}
}