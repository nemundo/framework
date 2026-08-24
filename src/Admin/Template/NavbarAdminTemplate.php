<?php

namespace Nemundo\Admin\Template;

use Nemundo\Admin\AdminConfig;
use Nemundo\Admin\Com\Layout\AdminFooter;
use Nemundo\Admin\Com\Layout\AdminMainContent;
use Nemundo\Admin\Com\Navbar\AdminNavbar;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Container\AbstractContainer;

class NavbarAdminTemplate extends AbstractAdminTemplate
{

    /**
     * @var bool
     */
    public $showUserActionMenu = true;

    /**
     * @var Div
     */
    private $content;

    /**
     * @var AdminNavbar
     */
    protected $navbar;

    /**
     * @var AdminFooter
     */
    protected $footer;

    protected function loadContainer()
    {

        parent::loadContainer();

        $nav = new AdminNavbar();
        $nav->logoText = AdminConfig::$logoText;
        $nav->logoImage = AdminConfig::$logoUrl;
        $nav->site = AdminConfig::$webController;

        $this->content = new AdminMainContent();

        parent::addContainer($nav);
        parent::addContainer($this->content);

        $this->footer = new AdminFooter();
        parent::addContainer($this->footer);

    }


    public function addContainer(AbstractContainer $container)
    {

        $this->content->addContainer($container);

    }


    public function getContent()
    {

        $this->body->addCssClass('admin-body');
        $this->navbar->showUserActionMenu = $this->showUserActionMenu;

        return parent::getContent();

    }

}