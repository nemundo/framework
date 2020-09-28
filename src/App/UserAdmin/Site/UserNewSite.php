<?php

namespace Nemundo\App\UserAdmin\Site;


use Nemundo\App\UserAdmin\Form\UserForm;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Web\Site\AbstractSite;

class UserNewSite extends AbstractSite
{

    /**
     * @var UserNewSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'New User';
        $this->url = 'new';
        $this->menuActive = false;

        UserNewSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $layout = new BootstrapTwoColumnLayout($page);

        $form = new UserForm($layout->col1);
        $form->redirectSite = UserAdminSite::$site;


        $page->render();

    }

}