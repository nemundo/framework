<?php

namespace Nemundo\Admin\AppDesigner\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;

class ModelIndexParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'index';
    }

}