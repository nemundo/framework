<?php

namespace Nemundo\Admin\MySql\Widget;

use Nemundo\Admin\Com\Widget\AbstractAdminWidget;
use Nemundo\Admin\MySql\Admin\MySqlDatabaseAdmin;


class MySqlDatabaseWidget extends AbstractAdminWidget
{

    protected function loadWidget()
    {

    }


    public function getContent()
    {

        $this->widgetTitle = 'MySql Database';

        new MySqlDatabaseAdmin($this);

        return parent::getContent();
    }


}