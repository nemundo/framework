<?php

namespace Nemundo\Admin\AppDesigner\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;

class AppParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'app';
    }

}