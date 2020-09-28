<?php

namespace Nemundo\Admin\AppDesigner\Site;


use Nemundo\Admin\UniqueId\Widget\UniqueIdAdminWidget;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Web\Site\AbstractSite;

class WidgetSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->title = 'Widget';
        $this->url = 'widget';
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $layout = new BootstrapTwoColumnLayout($page);

        new UniqueIdAdminWidget($layout->col1);

        $page->render();

    }

}