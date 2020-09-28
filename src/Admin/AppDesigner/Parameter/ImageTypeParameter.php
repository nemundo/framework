<?php

namespace Nemundo\Admin\AppDesigner\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;

class ImageTypeParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'image-type';
    }

}