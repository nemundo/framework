<?php

namespace Nemundo\Package\Bootstrap\Navbar;


use Nemundo\Html\Inline\Span;
use Nemundo\Html\Button\Button;

class BootstrapNavbarToggler extends Button
{

    public function getContent()
    {

        $this->addCssClass('navbar-toggler navbar-toggler-right');
        $this->addAttribute('data-toggle', 'collapse');
        $this->addAttribute('data-target', '#navbarNavDropdown');
        $this->addAttribute('aria-controls', 'navbarNavDropdown');
        $this->addAttribute('aria-expanded', 'false');
        $this->addAttribute('aria-label', 'Toggle navigation');

        $span = new Span($this);
        $span->addCssClass('navbar-toggler-icon');

        return parent::getContent();

    }

}