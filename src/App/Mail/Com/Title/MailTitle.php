<?php

namespace Nemundo\App\Mail\Com\Title;

use Nemundo\Css\Builder\CssStyleBuilder;
use Nemundo\Html\Heading\H1;

class MailTitle extends H1
{

    public function getContent()
    {

        /*$h1 = new H1($layout);
        $h1->content = $this->mailTitle;*/

        $builder = new CssStyleBuilder();
        $builder->color = $this->darkColor;
        $this->addAttribute('style', $builder->getStyle());

        return parent::getContent(); // TODO: Change the autogenerated stub
    }

}