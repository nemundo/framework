<?php

namespace Nemundo\Admin\Com\ListBox;

use Nemundo\Html\Formatting\Bold;

trait AdminErrorMessageTrait
{

    protected function getLabelErrorMessage()
    {

        $text = $this->getLabelText();

        if ($this->showErrorMessage) {

            $bold = new Bold();
            $bold->addCssClass('admin-form-error');
            $bold->content = $this->errorMessage;

            $text .= ' ' . $bold->getBodyContent();

        }

        return $text;

    }


}