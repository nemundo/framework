<?php

namespace Nemundo\Package\Bootstrap\Navbar;


use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Formatting\Bold;
use Nemundo\Html\Hyperlink\Hyperlink;
use Nemundo\Html\Listing\Li;
use Nemundo\Html\Listing\Ul;
use Nemundo\Package\FontAwesome\FontAwesomeIcon;
use Nemundo\User\Login\Session\IsLoggedSession;
use Nemundo\User\Session\UserSession;
use Nemundo\Web\Site\AbstractSite;


class BootstrapSiteNavbar extends BootstrapNavbar
{

    /**
     * @var AbstractSite
     */
    public $site;

    /**
     * @var bool
     */
    public $userMode = true;

    /**
     * @var bool
     */
    public $searchMode = false;

    /**
     * @var AbstractSite[]
     */
    private $userMenuSiteList = [];


    public function addUserMenuSite(AbstractSite $site)
    {
        $this->userMenuSiteList[] = $site;
        return $this;
    }


    public function addUserMenuDivider()
    {
        $this->userMenuSiteList[] = null;
        return $this;
    }


    public function getContent()
    {

        $div = new Div($this);
        $div->id = 'navbarNavDropdown';
        $div->addCssClass('collapse navbar-collapse');

        $list = new Ul($div);
        $list->addCssClass('navbar-nav');

        foreach ($this->site->getMenuActiveSite() as $site) {

            $li = new Li($list);
            $li->addCssClass('nav-item');

            if ($site->hasItems()) {
                $li->addCssClass('dropdown');
            }

            if ($site->hasItems()) {

                $menuActive = false;
                foreach ($site->getMenuActiveSite() as $subSite) {
                    if ($subSite->menuActive) {
                        $menuActive = true;
                    }
                }

                if ($menuActive) {

                    $hyperlink = new Hyperlink($li);
                    $hyperlink->addCssClass('nav-link');
                    $hyperlink->content = $site->title;
                    $hyperlink->href='#';
                    $hyperlink->id='navbarDropdown2';
                    $hyperlink->addCssClass('dropdown-toggle');
                    $hyperlink->addAttribute('data-bs-toggle', 'dropdown');
                    $hyperlink->addAttribute('aria-expanded', 'false');
                    $hyperlink->addAttribute('role', 'button');

                    $ul = new Ul($li);
                    $ul->addAttribute('aria-labelledby', 'navbarDropdown2');
                    $ul->addCssClass('dropdown-menu');

                    foreach ($site->getMenuActiveSite() as $subSite) {
                        if ($subSite->menuActive) {

                            $li = new Li($ul);

                            $subHyperlink = new SiteHyperlink($li);
                            $subHyperlink->addCssClass('dropdown-item');
                            $subHyperlink->content = $subSite->title;
                            $subHyperlink->site = $subSite;
                        }
                    }
                } else {

                    $hyperlink = new SiteHyperlink($li);
                    $hyperlink->addCssClass('nav-link');
                    $hyperlink->content = $site->title;
                    $hyperlink->site = $site;

                }

            } else {

                $hyperlink = new SiteHyperlink($li);
                $hyperlink->addCssClass('nav-link');
                $hyperlink->content = $site->title;
                $hyperlink->site = $site;

            }

        }

        if ($this->userMode) {

            $isLogged = new IsLoggedSession();
            if ($isLogged->getValue()) {

/*
                <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>*/


                $li = new Li($list);
                $li->addCssClass('nav-item dropdown');

                $hyperlink = new Hyperlink($li);
                $hyperlink->id = 'navbarDropdown2';
                $hyperlink->addCssClass('nav-link dropdown-toggle');
                $hyperlink->addAttribute('data-bs-toggle', 'dropdown');
                $hyperlink->addAttribute('aria-expanded', 'false');
                $hyperlink->addAttribute('role', 'button');

                $icon = new FontAwesomeIcon($hyperlink);
                $icon->icon = 'user';

                $bold = new Bold($hyperlink);
                $bold->content = ' ' . (new UserSession())->displayName;

                $userList = new Ul($li); //new Div($li);
                $userList->addCssClass('dropdown-menu');
                $userList->addAttribute('aria-labelledby', 'navbarDropdown2');

                foreach ($this->userMenuSiteList as $userMenu) {

                    $subLi = new Li($userList);

                    if ($userMenu !== null) {
                        $subHyperlink = new SiteHyperlink($subLi);
                        $subHyperlink->addCssClass('dropdown-item');
                        $subHyperlink->site = $userMenu;
                    } else {
                        $divider = new Div($subLi);
                        $divider->addCssClass('dropdown-divider');
                    }

                }

            }

        }


        // das muss hier raus !!!

        /*if ($this->searchMode) {
            if ((new UserSessionType())->isUserLogged()) {
                //new NavbarSearchForm($this);
            }
        }*/

        return parent::getContent();

    }

}