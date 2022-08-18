<?php


namespace Nemundo\Admin\Com\Header;


use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Html\Header\Link\StylesheetLink;

class CssContainer extends AbstractHtmlContainer
{

    public function addCssUrl($url)
    {

        $style = new StylesheetLink($this);
        $style->href = $url;

        return $this;

    }

}