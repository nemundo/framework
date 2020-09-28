<?php

namespace Nemundo\Package\Bootstrap\Tab;


use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Core\Text\TextConvert;

class BootstrapTabsPanelContainer extends AbstractHtmlContainer
{

    /**
     * @var string
     */
    public $panelTitle;

    /**
     * @var string
     */
    public $panelUrl;

    /**
     * @var bool
     */
    public $active = false;

    public function getPanelId()
    {

        $panelId = TextConvert::convertToCode($this->panelTitle, true);
        return $panelId;

    }


}