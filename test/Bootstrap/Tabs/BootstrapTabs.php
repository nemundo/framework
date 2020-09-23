<?php


require '../config.php';


$html = new \Nemundo\Package\Bootstrap\Document\BootstrapDocument();


$tabs = new \Nemundo\Package\Bootstrap\Tabs\BootstrapTabs($html);

$panel = new \Nemundo\Package\Bootstrap\Tab\BootstrapTabsPanel($tabs);




$html->render();
