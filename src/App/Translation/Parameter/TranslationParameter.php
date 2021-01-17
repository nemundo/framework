<?php
namespace Nemundo\App\Translation\Parameter;
use Nemundo\Web\Parameter\AbstractUrlParameter;
class TranslationParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'translation';
}
}