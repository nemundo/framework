<?php

namespace Nemundo\App\Mail\Message\Mail;

use Nemundo\App\Mail\Com\Document\ActionMailHtmlDocument;
use Nemundo\App\Mail\MailConfig;

class ActionMailMessage extends AbstractMailMessage
{

    /**
     * @var string
     */
    public $mailTo;

    /**
     * @var string
     */
    public $subject;

    /**
     * @var ActionMailHtmlDocument
     */
    public $mailContainer;

    public function __construct()
    {

        parent::__construct();
        $this->mailContainer = (new MailConfig())->getActionMailDocument();

    }


    public function sendMail()
    {

        if ($this->mailContainer->logoInlineImage->hasImage()) {
            $this->addInlineImage($this->mailContainer->logoInlineImage);
        }
        $this->text = $this->mailContainer->getHtml();
        parent::sendMail();

    }


}