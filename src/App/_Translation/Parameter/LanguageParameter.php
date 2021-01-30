<?php
namespace Nemundo\App\Translation\Parameter;
use Nemundo\Web\Parameter\AbstractUrlParameter;
class LanguageParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'language';
}
}