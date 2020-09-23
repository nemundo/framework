<?php

namespace Nemundo\Admin\AppDesigner\Site\Project;


use Nemundo\Admin\AppDesigner\Form\Project\DefaultProjectForm;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;

class DefaultProjectSite extends AbstractSite
{

    protected function loadSite()
    {
       $this->title = 'Default Project';
       $this->url = 'default-project';
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        new DefaultProjectForm($page);

        $page->render();

    }

}