<?php

namespace Nemundo\Admin\AppDesigner\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;

class ModelFieldTypeParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'type';
    }

}