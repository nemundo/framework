<?php


namespace Nemundo\App\MySqlAdmin\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;

class TableParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'table';
    }
}