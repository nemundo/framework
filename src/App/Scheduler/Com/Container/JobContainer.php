<?php

namespace Nemundo\App\Scheduler\Com\Container;

use Nemundo\App\Application\Com\Container\AbstractApplicationFilterContainer;
use Nemundo\App\Scheduler\Com\Form\JobForm;
use Nemundo\App\Scheduler\Com\Table\JobTable;

class JobContainer extends AbstractApplicationFilterContainer
{

    public function getContent()
    {

        $form = new JobForm($this);
        $form->applicationId = $this->applicationId;

        $table = new JobTable($this);
        $table->applicationId = $this->applicationId;

        return parent::getContent();

    }


}