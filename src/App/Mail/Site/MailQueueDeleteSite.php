<?php

namespace Nemundo\App\Mail\Site;


use Nemundo\App\Mail\Data\MailQueue\MailQueueDelete;
use Nemundo\App\Mail\Parameter\MailUrlParameter;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;
use Nemundo\Http\Url\UrlReferer;

class MailQueueDeleteSite extends AbstractDeleteIconSite
{

    /**
     * @var MailQueueDeleteSite
     */
    public static $site;


    protected function loadSite()
    {
        MailQueueDeleteSite::$site=$this;
    }


    public function loadContent()
    {

        (new MailQueueDelete())->deleteById((new MailUrlParameter())->getValue());
        (new UrlReferer())->redirect();

    }

}