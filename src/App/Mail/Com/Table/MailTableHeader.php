<?php

namespace Nemundo\App\Mail\Com\Table;

use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Html\Table\Th;

class MailTableHeader extends TableHeader
{

    public function addText($label)
    {

        $th = new Th($this);
        $th->addAttribute('style', 'background-color: #92a8d1;');
        $th->content = $label;
        $th->nowrap = true;

        return $this;

    }

}