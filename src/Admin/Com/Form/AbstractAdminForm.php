<?php

namespace Nemundo\Admin\Com\Form;


use Nemundo\Admin\Com\Button\AdminSubmitButton;
use Nemundo\Com\FormBuilder\AbstractFormBuilder;
use Nemundo\Core\Language\LanguageCode;
use Nemundo\Html\Form\Button\SubmitButton;
use Nemundo\Package\Bootstrap\Form\BootstrapFormRow;


abstract class AbstractAdminForm extends AbstractFormBuilder
{

    /**
     * @var SubmitButton
     */
    public $submitButton;

    /**
     * @var BootstrapFormRow
     */
    protected $buttonFormRow;

    protected function loadContainer()
    {
        parent::loadContainer();

        $this->buttonFormRow = new BootstrapFormRow();

        $this->submitButton = new AdminSubmitButton($this->buttonFormRow);
        $this->submitButton->label=[];
        $this->submitButton->label[LanguageCode::EN] = 'Save';
        $this->submitButton->label[LanguageCode::DE] = 'Speichern';

    }


    public function getContent()
    {

        $this->addContainer($this->buttonFormRow);
        return parent::getContent();
    }

}