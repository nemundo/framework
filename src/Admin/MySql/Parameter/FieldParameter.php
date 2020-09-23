<?php

namespace Nemundo\Admin\MySql\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;

class FieldParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'mysql-field';
    }

}