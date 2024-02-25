<?php

namespace Nemundo\Admin\Controller;

use Nemundo\Admin\Site\AdminHomeSite;
use Nemundo\Admin\Site\DevSite;
use Nemundo\App\Application\Site\AdminSite;
use Nemundo\App\Application\Site\AppSite;
use Nemundo\App\Application\Site\PublicSite;
use Nemundo\App\UserAction\Site\UserActionSite;
use Nemundo\Web\Site\AbstractSite;

trait AdminControllerTrait
{

    /**
     * @var AbstractSite[]
     */
    private static $adminSiteList = [];

    public static function addAdminSite(AbstractSite $site)
    {
        AdminController::$adminSiteList[] = $site;
    }


    protected function loadController()
    {

        new AdminHomeSite($this);

        $site = new AppSite($this);
        $site->restricted = false;

        $site = new AdminSite($this);
        $site->restricted = false;

        new DevSite($this);
        new PublicSite($this);
        new UserActionSite($this);

        foreach (AdminController::$adminSiteList as $site) {
            $this->addSite($site);
        }

    }


}