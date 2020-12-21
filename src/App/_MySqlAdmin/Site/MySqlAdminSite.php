<?php


namespace Nemundo\App\MySqlAdmin\Site;


use Nemundo\App\MySqlAdmin\Page\MySqlAdminPage;
use Nemundo\Web\Site\AbstractSite;

class MySqlAdminSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->title = 'MySql Admin';
        $this->url = 'mysql-admin';

    }


    public function loadContent()
    {
        (new MySqlAdminPage())->render();
    }

}