<?php

namespace Nemundo\Admin\Com\Button;


use Nemundo\Core\Language\LanguageCode;
use Nemundo\Html\Character\HtmlCharacter;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Html\Form\Formatting\Label;
use Nemundo\Package\Bootstrap\Button\BootstrapButtonSize;
use Nemundo\Package\Bootstrap\FormElement\BootstrapSubmitButton;


// SearchAdminButton
class AdminSearchButton extends AbstractHtmlContainer
{

    public function getContent()
    {

        $this->tagName = 'div';
        $this->addCssClass('pr-3');
        $this->addCssClass('form-group');

        $label = new Label($this);
        $label->content = HtmlCharacter::NON_BREAKING_SPACE;

        $btn = new BootstrapSubmitButton($this);
        $btn->size = BootstrapButtonSize::SMALL;
        $btn->label = [];
        $btn->label[LanguageCode::EN] = 'Search';
        $btn->label[LanguageCode::DE] = 'Suchen';
        $btn->addCssClass('form-control');

        return parent::getContent();

    }

}