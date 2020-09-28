<?php

namespace Nemundo\Admin\AppDesigner\Form\Project;


use Nemundo\Admin\AppDesigner\AppDesignerConfig;
use Nemundo\Admin\AppDesigner\Cookie\DefaultProjectCookie;
use Nemundo\Admin\AppDesigner\Site\AppDesignerSite;
use Nemundo\Com\FormBuilder\AbstractFormBuilder;
use Nemundo\Package\Bootstrap\Form\BootstrapFormRow;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;

class DefaultProjectForm extends AbstractFormBuilder
{

    /**
     * @var BootstrapListBox
     */
    private $projectListBox;


    public function getContent()
    {

        $row = new BootstrapFormRow($this);

        $this->projectListBox = new BootstrapListBox($row);
        $this->projectListBox->emptyValueAsDefault = false;
        $this->projectListBox->label = 'Default Project';
        $this->projectListBox->value = (new DefaultProjectCookie())->getValue();
        $this->projectListBox->submitOnChange = true;
        foreach (AppDesignerConfig::$defaultProjectCollection->getProjectList() as $project) {
            $this->projectListBox->addItem($project->getClassName(), $project->project . ' (' . $project->namespace . ')');
        }

        return parent::getContent();
    }


    protected function onSubmit()
    {

        (new DefaultProjectCookie())->setValue($this->projectListBox->getValue());
        AppDesignerSite::$site->redirect();

    }

}