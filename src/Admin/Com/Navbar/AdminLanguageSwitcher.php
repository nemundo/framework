<?php

namespace Nemundo\Admin\Com\Navbar;

use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Core\Http\Url\UrlInformation;
use Nemundo\Core\Language\LanguageConfig;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Layout\Nav;
use Nemundo\Html\Script\ModuleJavaScript;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Site\UrlSite;
use Nemundo\Web\WebConfig;

class AdminLanguageSwitcher extends Nav
{

    use LibraryTrait;

    /**
     * @var AbstractSite
     */
    public $site;

    public $logoImage;

    public $logoText;

    /**
     * @var bool
     */
    public $fixed = false;

    public function getContent()
    {

        $this->addJsUrl('/package/js/framework/Admin/Dropdown/dropdown.js');

        $module = new ModuleJavaScript($this);
        $module->src = '/package/js/framework/Admin/Navbar/Navbar.js';

        $this->addCssClass('admin-navbar');

        if ($this->fixed) {
            $this->addCssClass('admin-navbar-fixed');
        }

        $left = new Div($this);
        $left->addCssClass('admin-navbar-left');


        $menu = new Div($left);
        //$menu->id = "admin-navbar-menu";
        //$menu->addCssClass('admin-navbar-menu');

        //new CloseMenu($menu);


        $languageMenu = new AdminNavbarDropdown($menu);
        $languageMenu->dropdownLabel = LanguageConfig::$currentLanguageCode;

        foreach ((new LanguageConfig())->getLanguageList() as $language) {

            /*$site = clone(AbstractWebController::$currentSite);
            $site->title = $language;

            $site->parentUrl = (new Text($site->parentUrl))->replaceLeft(WebConfig::$webUrl . LanguageConfig::$currentLanguageCode, WebConfig::$webUrl . $language)->getValue();
*/

            $site = new UrlSite();
            $site->url = (new Text((new UrlInformation())->getUrl()))->replaceLeft(WebConfig::$webUrl . LanguageConfig::$currentLanguageCode, WebConfig::$webUrl . $language)->getValue();
            $site->title = $language;

            $languageMenu->addSubsite($site);

        }

        new HamburgerMenu($this);

        return parent::getContent();

    }

}