<?php
namespace Nemundo\App\Notification\Site;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\App\Notification\Page\NotificationPage;
class NotificationSite extends AbstractSite {
protected function loadSite() {
$this->title = 'Notification';
$this->url = 'notification';
}
public function loadContent() {
(new NotificationPage())->render();
}
}