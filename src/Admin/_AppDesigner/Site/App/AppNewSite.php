<?php

namespace Nemundo\Admin\AppDesigner\Site\App;


use Nemundo\Admin\AppDesigner\Com\AppDesignerBreadcrumb;
use Nemundo\Admin\AppDesigner\Form\App\AppForm;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;

class AppNewSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->title = 'New App';
        $this->url = 'new';
        $this->menuActive = false;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        new AppDesignerBreadcrumb($page);
        new AppForm($page);

        $page->render();

    }

}