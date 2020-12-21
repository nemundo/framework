<?php

namespace Nemundo\Admin\MySql\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;

class IdParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'mysql-id';
    }

}