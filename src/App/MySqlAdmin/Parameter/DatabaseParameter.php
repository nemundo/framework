<?php


namespace Nemundo\App\MySqlAdmin\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;

class DatabaseParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'database';
    }
}