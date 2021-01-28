<?php

namespace Nemundo\Package\Bootstrap\Navbar;


use Nemundo\Html\Layout\Nav;


class BootstrapNavbar extends Nav
{

    /**
     * @var bool
     */
    public $fixed = false;


    public function getContent()
    {


        $this->addCssClass('navbar navbar-expand-lg navbar-light bg-light');

        if ($this->fixed) {
            $this->addCssClass('fixed-top');
        }

        new BootstrapNavbarToggler($this);

        return parent::getContent();

    }

}