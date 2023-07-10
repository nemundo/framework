<?php
namespace Nemundo\App\Backup\Parameter;
use Nemundo\Web\Parameter\AbstractUrlParameter;
class BackupParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'backup';
}
}