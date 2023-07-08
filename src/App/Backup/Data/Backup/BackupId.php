<?php
namespace Nemundo\App\Backup\Data\Backup;
use Nemundo\Model\Id\AbstractModelIdValue;
class BackupId extends AbstractModelIdValue {
/**
* @var BackupModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new BackupModel();
}
}