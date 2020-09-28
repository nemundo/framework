<?php

namespace Nemundo\Package\Bootstrap\Tab;


use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Html\Block\Div;

use Nemundo\Html\Listing\Li;
use Nemundo\Com\Html\Listing\UnorderedList;

class BootstrapTabsPanel extends AbstractHtmlContainer
{

    /**
     * @var BootstrapTabsPanelContainer[]
     */
    private $panelList = [];


    public function addPanel(BootstrapTabsPanelContainer $panel)
    {
        $this->panelList[] = $panel;
    }

    public function addContainer(AbstractContainer $panel)
    {

        $this->panelList[] = $panel;

    }


    public function getContent()
    {

        $menu = new UnorderedList();
        $menu->addCssClass('nav nav-tabs');
        $menu->addAttribute('role', 'tablist');

        foreach ($this->panelList as $panel) {
            $li = new Li($menu);
            $li->addCssClass('nav-item');

            $link = new UrlHyperlink($li);
            $link->addCssClass('nav-link');
            if ($panel->active) {
                $link->addCssClass('active');
            }
            $link->addAttribute('data-toggle', 'tab');
            $link->content = $panel->panelTitle;
            $link->url = '#' . $panel->getPanelId();

            if ($panel->panelUrl !== null) {
                $link->url = $panel->panelUrl;
            }

        }
        parent::addContainer($menu);


        $div = new Div();
        $div->addCssClass('tab-content');
        foreach ($this->panelList as $panel) {

            $divPanel = new Div();
            $divPanel->id = $panel->getPanelId();
            $divPanel->addCssClass('tab-pane');
            if ($panel->active) {
                $divPanel->addCssClass('active');
            }
            $divPanel->addAttribute('role', 'tabpanel');
            $divPanel->addContainer($panel);

            //parent::addContainer($panel);
            $div->addContainer($divPanel);

        }
        parent::addContainer($div);

        return parent::getContent();
    }


    /*

    <div class="tab-content">
<div class="tab-pane active" id="home" role="tabpanel">...</div>


    <ul class="nav nav-tabs" role="tablist">
<li class="nav-item">
<a class="nav-link active" data-toggle="tab" href="#home" role="tab">Home</a>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="tab" href="#profile" role="tab">Profile</a>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="tab" href="#messages" role="tab">Messages</a>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a>
</li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
<div class="tab-pane active" id="home" role="tabpanel">...</div>
<div class="tab-pane" id="profile" role="tabpanel">...</div>
<div class="tab-pane" id="messages" role="tabpanel">...</div>
<div class="tab-pane" id="settings" role="tabpanel">...</div>
</div>
  */


}