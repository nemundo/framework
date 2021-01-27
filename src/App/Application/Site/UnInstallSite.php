<?php


namespace Nemundo\App\Application\Site;


use Nemundo\App\Application\Parameter\ApplicationParameter;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Web\Site\AbstractSite;

// Uninstall
class UnInstallSite extends AbstractSite
{

    /**
     * @var UnInstallSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'UnInstall';
        $this->url = 'uninstall';

        UnInstallSite::$site = $this;

    }


    public function loadContent()
    {

        $app = (new ApplicationParameter())->getApplication();
        $app->uninstallApp();

        //(new UrlReferer())->redirect();

    }

}