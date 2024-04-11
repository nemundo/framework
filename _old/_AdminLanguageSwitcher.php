<?php

namespace _old;

use Nemundo\Admin\Com\Navbar\AdminNavbarDropdown;
use Nemundo\Core\Http\Url\UrlInformation;
use Nemundo\Core\Language\LanguageConfig;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Web\Site\UrlSite;
use Nemundo\Web\WebConfig;

class __AdminLanguageSwitcher extends AdminNavbarDropdown
{


    public function getContent()
    {

        $this->id = "admin-navbar-menu";
        $this->addCssClass('admin-navbar-menu');


        $dropdown = new AdminNavbarDropdown($this);
        $dropdown->dropdownLabel = LanguageConfig::$currentLanguageCode;

        foreach ((new LanguageConfig())->getLanguageList() as $language) {

            $site = new UrlSite();
            $site->url =(new Text((new UrlInformation())->getUrl()))->replaceLeft(WebConfig::$webUrl . LanguageConfig::$currentLanguageCode, WebConfig::$webUrl . $language)->getValue();
            $site->title = $language;

            $dropdown->addSubsite($site);

        }

        return parent::getContent();

    }


}