<?php

namespace Nemundo\Admin\AppDesigner\Site;


use Nemundo\Admin\AppDesigner\Install\AppDesignerInstall;
use Nemundo\Web\Site\AbstractSite;

class UpdateSite extends AbstractSite
{

    /**
     * @var UpdateSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Update';
        $this->url = 'update';



    }


    protected function registerSite()
    {
        UpdateSite::$site = $this;
    }


    public function loadContent()
    {

        //(new ActionClassImport())->importActionClass();
        //(new UrlReferer())->redirect();

        (new AppDesignerInstall())->run();

    }

}