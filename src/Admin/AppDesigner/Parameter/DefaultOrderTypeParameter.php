<?php

namespace Nemundo\Admin\AppDesigner\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;

class DefaultOrderTypeParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'default-order-type';
    }

}