<?php
namespace Nemundo\App\Backup\Data\Backup;
class BackupCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var BackupModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new BackupModel();
}
}