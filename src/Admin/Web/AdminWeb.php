<?php

namespace Nemundo\Admin\Web;


use Nemundo\Admin\AdminConfig;
use Nemundo\Admin\Controller\AdminController;
use Nemundo\Admin\Template\AdminTemplate;
use Nemundo\Core\Base\AbstractBase;


class AdminWeb extends AbstractBase
{


    public function startWeb()
    {

        /*
         * muss vor erstem Cookie Aufruf geändert werden
         *
        $webUrl = new \Nemundo\Core\Type\Text\Text(\Nemundo\Web\WebConfig::$webUrl);
        $webUrl->replaceRight('/web/', '/admin/');
        \Nemundo\Web\WebConfig::$webUrl = $webUrl->getValue();*/

        AdminConfig::$defaultTemplateClassName = AdminTemplate::class;
        (new AdminController())->render();

    }

}