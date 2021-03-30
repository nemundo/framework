<?php

namespace Nemundo\Admin\Controller;


use Nemundo\Admin\Site\AdminHomeSite;
use Nemundo\App\Application\Site\AdminSite;
use Nemundo\App\Application\Site\AppSite;
use Nemundo\App\ClassDesigner\Site\ClassDesignerSite;
use Nemundo\App\Git\Site\GitSite;
use Nemundo\App\ModelDesigner\Site\ModelDesignerSite;
use Nemundo\App\UserAction\Site\UserActionSite;
use Nemundo\Web\Controller\AbstractWebController;
use Nemundo\Web\Site\AbstractSite;


class AdminController extends AbstractWebController
{

    /**
     * @var AbstractSite[]
     */
    private static $adminSiteList = [];


    // addAdminSiteClass
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

        new UserActionSite($this);

        new ModelDesignerSite($this);
        new ClassDesignerSite($this);

        foreach (AdminController::$adminSiteList as $site) {
            $this->addSite($site);
        }

    }

}