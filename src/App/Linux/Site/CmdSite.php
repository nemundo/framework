<?php
namespace Nemundo\App\Linux\Site;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\App\Linux\Page\CmdPage;
class CmdSite extends AbstractSite {
protected function loadSite() {
$this->title = 'Cmd';
$this->url = 'cmd';
}
public function loadContent() {
(new CmdPage())->render();
}
}