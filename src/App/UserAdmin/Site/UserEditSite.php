<?php

namespace Nemundo\App\UserAdmin\Site;


use Nemundo\App\UserAdmin\Form\UserForm;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\FontAwesome\Icon\EditIcon;
use Nemundo\Package\FontAwesome\Site\AbstractIconSite;
use Nemundo\User\Parameter\UserParameter;

class UserEditSite extends AbstractIconSite
{

    /**
     * @var UserEditSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'edit';
        $this->icon = new EditIcon();
        $this->menuActive = false;

        UserEditSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $layout = new BootstrapTwoColumnLayout($page);

        $form = new UserForm($layout->col1);
        $form->userId = (new UserParameter())->getValue();
        $form->redirectSite = UserAdminSite::$site;

        $page->render();

    }

}