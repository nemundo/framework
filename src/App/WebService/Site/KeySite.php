<?php
namespace Nemundo\App\WebService\Site;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\App\WebService\Page\KeyPage;
class KeySite extends AbstractSite {
protected function loadSite() {
$this->title = 'Key';
$this->url = 'key';
}
public function loadContent() {
(new KeyPage())->render();
}
}