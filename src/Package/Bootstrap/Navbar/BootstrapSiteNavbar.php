<?php

namespace Nemundo\Package\Bootstrap\Navbar;


use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Formatting\Bold;
use Nemundo\Html\Hyperlink\Hyperlink;
use Nemundo\Html\Listing\Li;
use Nemundo\Html\Listing\Ul;
use Nemundo\Package\FontAwesome\FontAwesomeIcon;
use Nemundo\User\Login\Session\IsLoggedSession;
use Nemundo\User\Type\UserSessionType;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\SearchEngine\Com\Navbar\NavbarSearchForm;


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

            $hyperlink = new SiteHyperlink($li);
            $hyperlink->addCssClass('nav-link');


            $hyperlink->content = $site->title;
            $hyperlink->site = $site;

            if ($site->hasItems()) {

                $menuActive = false;
                foreach ($site->getMenuActiveSite() as $subSite) {
                    if ($subSite->menuActive) {
                        $menuActive = true;
                    }
                }

                if ($menuActive) {

                    $hyperlink->addCssClass('dropdown-toggle');
                    $hyperlink->addAttribute('data-toggle', 'dropdown');

                    $hyperlink->addAttribute('data-toggle', 'dropdown');
                    $hyperlink->addAttribute('aria-haspopup', 'true');
                    $hyperlink->addAttribute('aria-expanded', 'false');

                    $div = new Div($li);
                    $div->addCssClass('dropdown-menu');

                    foreach ($site->getMenuActiveSite() as $subSite) {
                        if ($subSite->menuActive) {
                            $subHyperlink = new SiteHyperlink($div);
                            $subHyperlink->addCssClass('dropdown-item');
                            $subHyperlink->content = $subSite->title;
                            $subHyperlink->site = $subSite;
                        }
                    }
                }

            }

        }

        if ($this->userMode) {

            $isLogged = new IsLoggedSession();
            if ($isLogged->getValue()) {

                $li = new Li($list);
                $li->addCssClass('nav-item dropdown');

                $hyperlink = new Hyperlink($li);
                $hyperlink->addCssClass('nav-link');
                $hyperlink->addCssClass('dropdown-toggle');
                $hyperlink->addAttribute('data-toggle', 'dropdown');
                $hyperlink->addAttribute('aria-haspopup', 'true');
                $hyperlink->addAttribute('aria-expanded', 'false');

                $icon = new FontAwesomeIcon($hyperlink);
                $icon->icon = 'user';

                $bold = new Bold($hyperlink);
                $bold->content = ' ' . (new UserSessionType())->displayName;

                $div = new Div($li);
                $div->addCssClass('dropdown-menu');
                $div->addAttribute('aria-labelledby', '');


                foreach ($this->userMenuSiteList as $userMenu) {

                    if ($userMenu !== null) {
                        $subHyperlink = new SiteHyperlink($div);
                        $subHyperlink->addCssClass('dropdown-item');
                        $subHyperlink->site = $userMenu;
                    } else {
                        $divider = new Div($div);
                        $divider->addCssClass('dropdown-divider');
                    }

                }

            }

        }


        // das muss hier raus !!!

        if ($this->searchMode) {
            if ((new UserSessionType())->isUserLogged()) {
                new NavbarSearchForm($this);
            }
        }

        return parent::getContent();

    }

}