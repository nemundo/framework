<?php

namespace Nemundo\Admin\MySql\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;

class TableParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'mysql-table';
    }

}