<?php

namespace Nemundo\App\Scheduler\Page;

use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\App\Scheduler\Com\Form\JobForm;
use Nemundo\App\Scheduler\Data\Job\JobPaginationReader;
use Nemundo\App\Scheduler\Site\JobSite;
use Nemundo\App\Scheduler\Template\SchedulerTemplate;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;

class JobPage extends SchedulerTemplate
{
    public function getContent()
    {

        $layout = new BootstrapTwoColumnLayout($this);

        $jobReader = new JobPaginationReader();
        $jobReader->model->loadScript();
        $jobReader->addOrder($jobReader->model->finished);
        $jobReader->addOrder($jobReader->model->id);

        $table = new AdminTable($layout->col1);

        $header = new AdminTableHeader($table);
        $header->addText($jobReader->model->script->label);
        $header->addText($jobReader->model->finished->label);
        $header->addText($jobReader->model->duration->label);

        foreach ($jobReader->getData() as $jobRow) {

            $row = new TableRow($table);
            $row->addText($jobRow->script->scriptClass);
            $row->addYesNo($jobRow->finished);
            $row->addText($jobRow->duration.' sec');


        }

        $pagination = new BootstrapPagination($layout->col1);
        $pagination->paginationReader = $jobReader;


        $form = new JobForm($layout->col2);
        $form->redirectSite = JobSite::$site;

        //new ScriptListBox($this);


        return parent::getContent();
    }
}