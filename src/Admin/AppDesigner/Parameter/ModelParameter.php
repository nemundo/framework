<?php

namespace Nemundo\Admin\AppDesigner\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;

class ModelParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'model';
    }

}