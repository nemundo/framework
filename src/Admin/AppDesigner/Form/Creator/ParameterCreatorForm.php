<?php

namespace Nemundo\Admin\AppDesigner\Form\Creator;


use Nemundo\Admin\AppDesigner\AppDesignerConfig;
use Nemundo\Admin\AppDesigner\Data\App\AppRow;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Dev\Code\PhpVisibility;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;


class ParameterCreatorForm extends BootstrapForm
{

    /**
     * @var AppRow
     */
    public $appRow;

    /**
     * @var BootstrapTextBox
     */
    private $parameter;


    public function getContent()
    {

        $this->parameter = new BootstrapTextBox($this);
        $this->parameter->label = 'Parameter Class Name';
        $this->parameter->validation = true;
        $this->parameter->autofocus = true;

        $this->submitButton->label = 'Create Parameter Class';


        return parent::getContent();
    }


    protected function onSubmit()
    {

        $parameterClassName = $this->parameter->getValue();
        $parameterName = (new Text($parameterClassName))->changeToLowercase()->getValue();

        $phpClass = new PhpClass();
        $phpClass->project = AppDesignerConfig::$defaultProject;
        $phpClass->className = $parameterClassName . 'Parameter';
        $phpClass->extendsFromClass = 'AbstractUrlParameter';
        $phpClass->namespace = $this->appRow->appNamespace . '\Parameter';

        $phpClass->addUseClass('Nemundo\Web\Parameter\AbstractUrlParameter');


        $function = new PhpFunction($phpClass);
        $function->visibility = PhpVisibility::ProtectedVariable;
        $function->functionName = 'loadParameter()';
        $function->add('$this->parameterName = \'' . $parameterName . '\';');


        $phpClass->saveFile();

    }

}