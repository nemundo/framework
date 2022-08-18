<?php

namespace Nemundo\App\Mail\Site;

use Nemundo\Admin\Site\AbstractViewSite;
use Nemundo\App\Mail\Data\MailQueue\MailQueueReader;
use Nemundo\App\Mail\Parameter\MailParameter;
use Nemundo\Core\Http\Response\HttpResponse;

class MailViewSite extends AbstractViewSite
{

    /**
     * @var MailViewSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'MailView';
        $this->url = 'mail-view';

        MailViewSite::$site = $this;

    }

    public function loadContent()
    {

        $mailParameter = new MailParameter();
        if ($mailParameter->exists()) {

            $mailRow = (new MailQueueReader())->getRowById($mailParameter->getValue());

            $response = new HttpResponse();
            $response->content = $mailRow->text;
            $response->sendResponse();

        }

    }
}