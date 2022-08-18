<?php

namespace Nemundo\App\Mail\Com\Layout;

use Nemundo\Css\Builder\CssStyleBuilder;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Html\Table\Table;
use Nemundo\Html\Table\Td;
use Nemundo\Html\Table\Tr;

class MailLayout extends Table
{

    public $backgroundColor;


    public function getContent()
    {

        $builder = new CssStyleBuilder();
        $builder->width = '100%';
        $builder->backgroundColor = $this->backgroundColor;

        $this->addAttribute('style', $builder->getStyle());


        return parent::getContent();

    }


    public function addContainer(AbstractContainer $container)
    {

        $tr = new Tr();
        parent::addContainer($tr);

        $td = new Td($tr);
        $td->addContainer($container);

        return $this;  // parent::addContainer($container);

    }


}