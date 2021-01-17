<?php

namespace Nemundo\App\Translation\Parameter;

use Nemundo\Web\Parameter\AbstractUrlParameter;

class SourceTypeParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'source-type';
    }
}