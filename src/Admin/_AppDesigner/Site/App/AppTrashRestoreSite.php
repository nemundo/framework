<?php

namespace Nemundo\Admin\AppDesigner\Site\App;


use Nemundo\Admin\AppDesigner\Connection\AppDesignerConnection;
use Nemundo\Admin\AppDesigner\Data\App\AppUpdate;
use Nemundo\Admin\AppDesigner\Parameter\AppParameter;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Core\Http\Url\UrlReferer;

class AppTrashRestoreSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->title = 'Restore';
        $this->url = 'restore';
        $this->menuActive = false;
    }


    public function loadContent()
    {

        $update = new AppUpdate();
        $update->connection = new AppDesignerConnection();
        $update->active = true;
        $update->updateById((new AppParameter())->getValue());

        (new UrlReferer())->redirect();

    }

}