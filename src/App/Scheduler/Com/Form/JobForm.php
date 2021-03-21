<?php

namespace Nemundo\App\Scheduler\Com\Form;


use Nemundo\App\Application\Parameter\ApplicationParameter;
use Nemundo\App\Scheduler\Builder\NextJobBuilder;
use Nemundo\App\Scheduler\Data\Job\Job;
use Nemundo\App\Scheduler\Data\Scheduler\SchedulerReader;
use Nemundo\App\Scheduler\Data\Scheduler\SchedulerUpdate;
use Nemundo\App\Scheduler\Status\PlannedSchedulerStatus;
use Nemundo\App\Script\Com\ListBox\ScriptListBox;
use Nemundo\Core\Type\DateTime\Time;
use Nemundo\Core\Validation\ValidationType;
use Nemundo\Html\Form\Input\HiddenInput;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Package\Bootstrap\FormElement\BootstrapCheckBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class JobForm extends BootstrapForm
{

    /**
     * @var ScriptListBox
     */
    private $script;


    public function getContent()
    {

        $formRow = new BootstrapRow($this);

        $this->script=new ScriptListBox($this);



        return parent::getContent();
    }


    protected function onSubmit()
    {

        $data=new Job();
        $data->scriptId=$this->script->getValue();
        $data->finished=false;
        $data->statusId=(new PlannedSchedulerStatus())->id;
        $data->save();



    }

}