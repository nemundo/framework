<?php

namespace Nemundo\Admin\Template;

use Nemundo\Admin\Com\Layout\AdminMainContent;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Container\AbstractContainer;

class AdminTemplate extends AbstractAdminTemplate
{

    /**
     * @var AdminMainContent
     */
    private $content;


    protected function loadContainer()
    {

        parent::loadContainer();
        $this->content = new AdminMainContent();
        parent::addContainer($this->content);

    }


    public function addContainer(AbstractContainer $container)
    {

        $this->content->addContainer($container);

    }

}