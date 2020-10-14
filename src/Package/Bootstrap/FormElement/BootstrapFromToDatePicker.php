<?php

namespace Nemundo\Package\Bootstrap\FormElement;

use Nemundo\Core\Language\LanguageCode;
use Nemundo\Core\Language\LanguageConfig;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Package\Bootstrap\Form\BootstrapFormRow;

class BootstrapFromToDatePicker extends AbstractContainer
{

    /**
     * @var BootstrapDatePicker
     */
    public $from;

    /**
     * @var BootstrapDatePicker
     */
    public $to;

    /**
     * @var bool
     */
    public $searchMode = false;

    protected function loadContainer()
    {

        parent::loadContainer();

        $formRow = new BootstrapFormRow($this);

        $this->from = new BootstrapDatePicker($formRow);
        $this->from->label[LanguageCode::EN] = 'From';
        $this->from->label[LanguageCode::DE] = 'Von';

        $this->to = new BootstrapDatePicker($formRow);
        $this->to->label[LanguageCode::EN] = 'To';
        $this->to->label[LanguageCode::DE] = 'Bis';

    }


    public function getContent()
    {

        $this->from->searchMode = $this->searchMode;
        $this->to->searchMode = $this->searchMode;

        return parent::getContent();

    }

}