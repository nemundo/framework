<?php

namespace Nemundo\App\Dataset\Parameter;

use Nemundo\Web\Parameter\AbstractUrlParameter;

class DatasetParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'dataset';
    }
}