<?php

namespace Nemundo\Admin\AppDesigner\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;

class ActionParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'action';
    }
}