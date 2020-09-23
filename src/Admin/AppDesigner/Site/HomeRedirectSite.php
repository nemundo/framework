<?php

namespace Nemundo\Admin\AppDesigner\Site;


use Nemundo\Web\Site\AbstractSite;

class HomeRedirectSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->menuActive = false;
    }

    public function loadContent()
    {

        //(new AppDesignerSite())->redirect();



    }

}