<?php
namespace Nemundo\App\Application\Site;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\App\Application\Page\ProjectPage;
class ProjectSite extends AbstractSite {
protected function loadSite() {
$this->title = 'Project';
$this->url = 'project';
}
public function loadContent() {
(new ProjectPage())->render();
}
}