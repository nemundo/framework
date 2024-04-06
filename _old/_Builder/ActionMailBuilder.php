<?php

namespace _old\_Builder;

use Nemundo\App\Mail\MailConfig;
use Nemundo\App\Mail\Message\Mail\MailMessage;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Html\Container\HtmlContainer;

class ActionMailBuilder extends AbstractBase
{

    public $mailTo;

    public $subject;

    /**
     * @var HtmlContainer
     */
    public $mailContainer;


    public function __construct() {

        $this->mailContainer = new HtmlContainer();

}


    public function sendMail()
    {

        $document = (new MailConfig())->getActionMailDocument();
//$document->mailDiv
        //$this->mailContainer->getBodyContent();

        $message = new MailMessage();
        $message->mailTo = 'urs.lang@onedigit.ch';
        $message->subject = 'BUR Import';
        $message->text = $document->getHtml();
        $message->sendMail();

    }


}