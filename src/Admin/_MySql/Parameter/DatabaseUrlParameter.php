<?php

namespace Nemundo\Admin\MySql\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;

class DatabaseUrlParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'database';
    }

}