<?php

namespace Nemundo\App\Scheduler\Page\Job;

use Nemundo\Admin\Com\Form\AdminSearchForm;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Layout\Grid\AdminTwoColumnGridLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\App\Application\Com\ListBox\ApplicationListBox;
use Nemundo\App\Scheduler\Com\Table\JobTable;
use Nemundo\App\Scheduler\Site\Job\JobRunSite;
use Nemundo\App\Scheduler\Template\SchedulerTemplate;
use Nemundo\App\Script\Com\Table\ScriptTable;
use Nemundo\App\Script\Data\Script\ScriptReader;
use Nemundo\App\Script\Parameter\ScriptParameter;
use Nemundo\App\Script\Site\ScriptRunSite;

class JobPage extends SchedulerTemplate
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);

        $search = new AdminSearchForm($layout);

        $application = new ApplicationListBox($search);
        $application->submitOnChange = true;
        $application->searchMode = true;

        $twoColLayout = new AdminTwoColumnGridLayout($layout);

        $table = new AdminTable($twoColLayout);

        $scriptReader = new ScriptReader();
        $scriptReader->model->loadApplication();

        $header = new AdminTableHeader($table);
        $header->addText($scriptReader->model->application->label);
        $header->addText($scriptReader->model->scriptName->label);
        $header->addText($scriptReader->model->description->label);
        $header->addText($scriptReader->model->scriptClass->label);
        //$header->addText($scriptReader->model->consoleScript->label);
        $header->addEmpty();

        if ($application->hasValue()) {
            $scriptReader->filter->andEqual($scriptReader->model->applicationId, $application->getValue());
        }

        foreach ($scriptReader->getData() as $scriptRow) {

            $row = new AdminTableRow($table);
            $row->addText($scriptRow->application->application);
            $row->addText($scriptRow->scriptName);
            $row->addText($scriptRow->description);
            $row->addText($scriptRow->scriptClass);
            //$row->addYesNo($scriptRow->consoleScript);

            $site = clone(JobRunSite::$site);
            $site->addParameter(new ScriptParameter($scriptRow->id));
            $row->addIconSite($site);

        }


        $table = new JobTable($twoColLayout);
        $table->applicationId = $application->getValue();


        return parent::getContent();
    }
}