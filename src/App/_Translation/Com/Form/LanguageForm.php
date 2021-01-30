<?php


namespace Nemundo\App\Translation\Com\Form;


use Nemundo\Admin\Com\Form\AbstractAdminEditForm;
use Nemundo\App\Translation\Data\Language\LanguageModel;
use Nemundo\App\Translation\Data\Language\LanguageReader;
use Nemundo\App\Translation\Language\Language;
use Nemundo\App\Translation\Setup\LanguageSetup;
use Nemundo\Package\Bootstrap\FormElement\BootstrapCheckBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class LanguageForm extends AbstractAdminEditForm
{

    /**
     * @var BootstrapTextBox
     */
    private $code;

    /**
     * @var BootstrapTextBox
     */
    private $language;

    /**
     * @var BootstrapCheckBox
     */
    private $defaultLanguage;

    public function getContent()
    {

        $model = new LanguageModel();

        $this->code = new BootstrapTextBox($this);
        $this->code->label = $model->code->label;
        $this->code->validation = true;

        $this->language = new BootstrapTextBox($this);
        $this->language->label = $model->language->label;
        $this->language->validation = true;

        $this->defaultLanguage=new BootstrapCheckBox($this);
        $this->defaultLanguage->label=$model->default->label;



        return parent::getContent();

    }


    protected function loadUpdateForm()
    {

        $languageRow = (new LanguageReader())->getRowById($this->dataId);
        $this->language->value = $languageRow->language;
        $this->code->value = $languageRow->code;
        $this->defaultLanguage->value=$languageRow->default;

    }


    protected function onSave()
    {

        $language=new Language();
        $language->code = $this->code->getValue();
        $language->language= $this->language->getValue();
        $language->defaultLanguage = $this->defaultLanguage->getValue();

        (new LanguageSetup())
            ->addLanguage($language);

    }


    protected function onUpdate()
    {

        $this->onSave();

       /* $update = new LanguageUpdate();
        $update->easyLanguage = $this->language->getValue();
        $update->isoCode = $this->code->getValue();
        $update->updateById($this->dataId);*/

    }

}