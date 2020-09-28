<?php

namespace Nemundo\Com\Html\Hyperlink;



use Nemundo\Html\Hyperlink\AbstractHyperlink;


class UrlHyperlink extends AbstractHyperlink
{

    //use ContainerUserRestrictionTrait;
    use HyperlinkTrait;

    /**
     * @var string
     */
    public $url;

    /**
     * @var string
     */
    public $title;

    /**
     * @var bool
     */
    //public $openNewWindow = false;

    public function getContent()
    {

        $this->checkContainerVisibility();


        $this->href = $this->url;

        $this->loadHyperlink();

        /*if ($this->openNewWindow) {
            $this->target = HyperlinkTarget::BLANK;
        }*/

        return parent::getContent();

    }

}