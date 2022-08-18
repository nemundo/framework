<?php

namespace Nemundo\App\Mail\Message;

use Nemundo\App\Mail\Com\Document\MailHtmlHtmlDocument;
use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Html\Heading\H1;
use Nemundo\Html\Paragraph\Paragraph;

class ActionMailMessage extends AbstractActionMailMessage
{

    public function sendMail()
    {

        $html = new MailHtmlHtmlDocument();

        $h1 = new H1($html);
        $h1->content = $this->actionTitle;

        $p = new Paragraph($html);
        $p->content = $this->actionText;

        $hyperlink = new UrlHyperlink($html);
        $hyperlink->content = $this->actionLabel;
        $hyperlink->url = $this->actionUrl;

        $this->text = $html->getHtml();

        parent::sendMail();

    }

}