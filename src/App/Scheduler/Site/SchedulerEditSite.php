<?php

namespace Nemundo\App\Scheduler\Site;


use Nemundo\App\Scheduler\Com\Form\SchedulerCustomForm;
use Nemundo\App\Scheduler\Com\Navigation\SchedulerNavigation;
use Nemundo\App\Scheduler\Parameter\SchedulerParameter;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\FontAwesome\Icon\EditIcon;
use Nemundo\Package\FontAwesome\Site\AbstractIconSite;

class SchedulerEditSite extends AbstractIconSite
{

    /**
     * @var SchedulerEditSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Edit';
        $this->url = 'edit';
        $this->menuActive = false;
        $this->icon = new EditIcon();

        SchedulerEditSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        new SchedulerNavigation($page);


        $form = new SchedulerCustomForm($page);
        $form->schedulerId = (new SchedulerParameter())->getValue();
        $form->redirectSite = clone(SchedulerSite::$site);

        $page->render();

    }

}