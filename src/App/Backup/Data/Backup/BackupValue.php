<?php
namespace Nemundo\App\Backup\Data\Backup;
class BackupValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var BackupModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new BackupModel();
}
}