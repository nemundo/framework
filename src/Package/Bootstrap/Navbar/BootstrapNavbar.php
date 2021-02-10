<?php

namespace Nemundo\Package\Bootstrap\Navbar;


use Nemundo\Html\Block\Div;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Html\Layout\Nav;


class BootstrapNavbar extends Nav
{

    /**
     * @var bool
     */
    public $fixed = false;

    /**
     * @var Div
     */
    private $containerDiv;


    protected function loadContainer()
    {

        parent::loadContainer();

        $this->containerDiv = new Div();
        $this->containerDiv->addCssClass('container-fluid');

        parent::addContainer($this->containerDiv);

    }

    public function getContent()
    {

        $this->addCssClass('navbar navbar-expand-lg navbar-light bg-light');

        if ($this->fixed) {
            $this->addCssClass('fixed-top');
        }

        $toggler = new BootstrapNavbarToggler();
        $this->addContainer($toggler);

        return parent::getContent();

    }


    public function addContainer(AbstractContainer $container)
    {

        $this->containerDiv->addContainer($container);

    }

}