<?php

namespace Nemundo\App\Application\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;

class ApplicationParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'app';
    }

}