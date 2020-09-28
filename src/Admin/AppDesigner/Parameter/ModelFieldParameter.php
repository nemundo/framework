<?php

namespace Nemundo\Admin\AppDesigner\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;

class ModelFieldParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'field';
    }

}