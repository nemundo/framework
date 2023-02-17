<?php

namespace Nemundo\App\Scheduler\Com\Container;

use Nemundo\App\Application\Com\Container\AbstractApplicationFilterContainer;
use Nemundo\App\Scheduler\Com\Form\JobForm;
use Nemundo\App\Scheduler\Com\Table\JobTable;
use Nemundo\App\Scheduler\Com\Table\SchedulerTable;
use Nemundo\Html\Heading\H3;

class SchedulerContainer extends AbstractApplicationFilterContainer
{

    //public $applicationId;

    public function getContent()
    {

        //$applicationId = (new FeedApplication())->applicationId;

        $h3 = new H3($this);
        $h3->content = 'Scheduler';

        $table = new SchedulerTable($this);
        $table->applicationId = $this->applicationId;


        $h3 = new H3($this);
        $h3->content = 'Job';

        $form = new JobForm($this);
        $form->applicationId = $this->applicationId;
        //$form->redirectSite = JobSite::$site;


        $table = new JobTable($this);
        $table->applicationId = $this->applicationId;

        return parent::getContent();

    }


}