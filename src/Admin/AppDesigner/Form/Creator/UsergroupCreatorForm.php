<?php

namespace Nemundo\Admin\AppDesigner\Form\Creator;


use Nemundo\Admin\AppDesigner\AppDesignerConfig;
use Nemundo\Admin\AppDesigner\Data\App\AppRow;
use Nemundo\Core\Random\UniqueId;
use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Dev\Code\PhpVisibility;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class UsergroupCreatorForm extends BootstrapForm
{

    /**
     * @var AppRow
     */
    public $appRow;

    /**
     * @var BootstrapTextBox
     */
    private $usergroup;

    public function getContent()
    {

        $this->usergroup = new BootstrapTextBox($this);
        $this->usergroup->label = 'Usergroup';
        $this->usergroup->validation = true;
        $this->usergroup->autofocus = true;


        return parent::getContent();
    }


    protected function onSubmit()
    {

        $usergroup = $this->usergroup->getValue();


        $phpClass = new PhpClass();
        $phpClass->project = AppDesignerConfig::$defaultProject;
        $phpClass->className = $usergroup . 'Usergroup';
        $phpClass->extendsFromClass = 'AbstractUsergroup';
        $phpClass->namespace = $this->appRow->appNamespace . '\Usergroup';

        $phpClass->addUseClass('Nemundo\User\Usergroup\AbstractUsergroup');

        $function = new PhpFunction($phpClass);
        $function->visibility = PhpVisibility::ProtectedVariable;
        $function->functionName = 'loadUsergroup()';
        $function->add('$this->usergroup = \'' . $usergroup . '\';');
        $function->add('$this->usergroupId = \'' . (new UniqueId())->getUniqueId() . '\';');

        $phpClass->saveFile();

    }

}