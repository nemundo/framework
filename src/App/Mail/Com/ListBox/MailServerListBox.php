<?php

namespace Nemundo\App\Mail\Com\ListBox;

use Nemundo\Admin\Com\ListBox\AdminListBox;
use Nemundo\App\Mail\Data\MailServer\MailServerReader;

class MailServerListBox extends AdminListBox
{
    public function getContent()
    {
        $this->label = 'Mail Server';

        $reader = new MailServerReader();

        foreach ($reader->getData() as $serverRow) {
            $this->addItem($serverRow->id,$serverRow->host.' ('.$serverRow->mailAddress.')');
        }

        return parent::getContent();
    }
}