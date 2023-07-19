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

        $this->body->addCssClass('admin-body');

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

}