<?php

namespace Nemundo\Package\Bootstrap\Listing;


use Nemundo\Html\Listing\Li;
use Nemundo\Com\Html\Listing\UnorderedList;

class BootstrapList extends UnorderedList
{


    public function getContent()
    {


        $this->addCssClass('list-group');

        //Bottom
        $this->addCssClass('p-t-2');

        //Bottom
        $this->addCssClass('p-b-2');

        return parent::getContent();
    }


    public function addText($text)
    {
        $li = new Li($this);
        $li->addCssClass('list-group-item');
        $li->content = $text;
        return $this;
    }


    public function addActiveText($text)
    {

    }


}