<?php
namespace Nemundo\App\Backup\Data\Backup;
class BackupDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var BackupModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new BackupModel();
}
}