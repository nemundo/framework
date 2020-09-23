<?php

namespace Nemundo\App\Scheduler\Site;


use Nemundo\App\Application\Com\ApplicationListBox;
use Nemundo\App\Scheduler\Com\Navigation\SchedulerNavigation;
use Nemundo\App\Scheduler\Com\Table\SchedulerTable;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Form\BootstrapFormRow;
use Nemundo\Web\Site\AbstractSite;

class SchedulerSite extends AbstractSite
{

    /**
     * @var SchedulerSite
     */
    public static $site;


    protected function loadSite()
    {
        $this->title = 'Scheduler';
        $this->url = 'scheduler';

        new SchedulerEditSite($this);
        new SchedulerLogSite($this);
        new SchedulerActiveSite($this);
        new SchedulerInactiveSite($this);
        new SchedulerSchedulerLogSite($this);
        new SchedulerRunningSite($this);
        new SchedulerRunSite($this);

        SchedulerSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        new SchedulerNavigation($page);

        $form = new SearchForm($page);

        $formRow = new BootstrapFormRow($form);

        $application = new ApplicationListBox($formRow);
        $application->submitOnChange = true;
        $application->value = $application->getValue();

        $table = new SchedulerTable($page);
        $table->applicationId = $application->getValue();

        $page->render();

    }

}