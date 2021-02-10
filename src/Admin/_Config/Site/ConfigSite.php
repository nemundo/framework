<?php

namespace Nemundo\Admin\Config\Site;


use Nemundo\Admin\Config\Com\ConfigInformationTable;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapColumn;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Package\Bootstrap\Listing\BootstrapHyperlinkList;
use Nemundo\Web\Site\AbstractSite;


class ConfigSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->title = 'Config';
        $this->url = 'config';
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $row = new BootstrapRow($page);

        $colLeft = new BootstrapColumn($row);
        $colLeft->columnWidth = 4;

        $colRight = new BootstrapColumn($row);
        $colRight->columnWidth = 8;

        $list = new BootstrapHyperlinkList($colLeft);
        $list->addHyperlink('Database', '#config_database');
        $list->addHyperlink('Smtp', '#config_smtp');
        $list->addHyperlink('Web', '#config_web');
        $list->addHyperlink('Deployment', '#config_deployment');

        new ConfigInformationTable($colRight);

        $page->render();

    }

}