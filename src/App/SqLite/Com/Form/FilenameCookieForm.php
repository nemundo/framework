<?php


namespace Nemundo\App\SqLite\Com\Form;


use Nemundo\App\SqLite\Cookie\FilenameCookie;
use Nemundo\App\SqLite\SqLiteConfig;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\Form\BootstrapFormRow;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class FilenameCookieForm extends BootstrapForm
{

    /**
     * @var BootstrapTextBox
     */
    private $input;

    public function getContent()
    {

        $formRow=new BootstrapFormRow($this);

        $this->input=new BootstrapTextBox($formRow);
        $this->input->label='SqLite Filename';
        $this->input->value= (new FilenameCookie())->getValue();

        //    SqLiteConfig::$sqLiteFilename;



        return parent::getContent(); // TODO: Change the autogenerated stub
    }


    protected function onSubmit()
    {

        (new FilenameCookie())->setValue($this->input->getValue());

    }


}