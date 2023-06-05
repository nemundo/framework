<?php
namespace Nemundo\App\Inbox\Site;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\App\Inbox\Page\InboxPage;
class InboxSite extends AbstractSite {
protected function loadSite() {
$this->title = 'Inbox';
$this->url = 'inbox';
}
public function loadContent() {
(new InboxPage())->render();
}
}