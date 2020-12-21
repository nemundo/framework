<?php
namespace Nemundo\Admin\SqlAnalyzer\Data\SqlAnalyzerQuery;
use Nemundo\Model\Id\AbstractModelIdValue;
class SqlAnalyzerQueryId extends AbstractModelIdValue {
/**
* @var SqlAnalyzerQueryModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SqlAnalyzerQueryModel();
}
}