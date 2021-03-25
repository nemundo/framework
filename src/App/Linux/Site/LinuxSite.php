<?php


namespace Nemundo\App\Linux\Site;


use Nemundo\App\Linux\Page\LinuxPage;
use Nemundo\Web\Site\AbstractSite;

class LinuxSite extends AbstractSite
{

    /**
     * @var LinuxSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Linux';
        $this->url = 'linux';

        LinuxSite::$site = $this;

    }


    public function loadContent()
    {

        (new LinuxPage())->render();

    }

}