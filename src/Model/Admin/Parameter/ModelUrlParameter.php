<?php

namespace Nemundo\Model\Admin\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;

class ModelUrlParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'model';
    }

}