<?php
namespace Nemundo\App\Dataset\Site;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\App\Dataset\Page\DatasetPage;
class DatasetSite extends AbstractSite {
protected function loadSite() {
$this->title = 'Dataset';
$this->url = 'dataset';
}
public function loadContent() {
(new DatasetPage())->render();
}
}