<?php

namespace Nemundo\Admin\AppDesigner\Form\Creator;


use Nemundo\Admin\AppDesigner\AppDesignerConfig;
use Nemundo\Admin\AppDesigner\Data\App\AppRow;
use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Dev\Code\PhpVisibility;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapCheckBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class SiteCreatorForm extends BootstrapForm
{

    /**
     * @var AppRow
     */
    public $appRow;

    /**
     * @var BootstrapTextBox
     */
    private $siteName;

    /**
     * @var BootstrapTextBox
     */
    private $siteUrl;

    /**
     * @var BootstrapCheckBox
     */
    private $createPage;

    public function getContent()
    {

        $this->siteName = new BootstrapTextBox($this);
        $this->siteName->label = 'Site Name';
        $this->siteName->autofocus = true;
        $this->siteName->validation = true;

        $this->siteUrl = new BootstrapTextBox($this);
        $this->siteUrl->label = 'Site Url';

        $this->createPage = new BootstrapCheckBox($this);
        $this->createPage->label = 'Create Page Class';
        $this->createPage->value = true;

        return parent::getContent();
    }


    protected function onSubmit()
    {

        $className = $this->siteName->getValue();

        $phpClass = new PhpClass();
        $phpClass->overwriteExistingPhpFile = false;
        $phpClass->project = AppDesignerConfig::$defaultProject;
        $phpClass->namespace = $this->appRow->appNamespace . '\\Site';
        $phpClass->className = $className . 'Site';
        $phpClass->extendsFromClass = 'AbstractSite';
        $phpClass->addUseClass('Nemundo\Web\Site\AbstractSite');

        $function = new PhpFunction($phpClass);
        $function->functionName = 'loadSite()';
        $function->visibility = PhpVisibility::ProtectedVariable;

        $function->add('$this->title = \'' . $this->siteName->getValue() . '\';');
        $function->add('$this->url = \'' . $this->siteUrl->getValue() . '\';');

        $function = new PhpFunction($phpClass);
        $function->functionName = 'loadContent()';

        $phpClass->saveFile();


        if ($this->createPage->getValue()) {


            $phpClass = new PhpClass();
            $phpClass->project = AppDesignerConfig::$defaultProject;
            $phpClass->namespace = $this->appRow->appNamespace . '\\Page';
            $phpClass->className = $className . 'Page';

            $phpClass->saveFile();


        }


    }


}