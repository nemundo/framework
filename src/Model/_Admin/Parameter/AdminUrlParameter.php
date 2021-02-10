<?php

namespace Nemundo\Model\Admin\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;

class AdminUrlParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'id';
    }

}