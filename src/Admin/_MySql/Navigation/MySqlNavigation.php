<?php

namespace Nemundo\Admin\MySql\Navigation;


use Nemundo\Admin\MySql\Site\MySqlSite;
use Nemundo\Package\Bootstrap\Tabs\BootstrapSiteTabs;

class MySqlNavigation extends BootstrapSiteTabs
{

    public function getContent()
    {
        $this->site = MySqlSite::$site;
        return parent::getContent();
    }

}