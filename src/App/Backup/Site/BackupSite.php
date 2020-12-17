<?php


namespace Nemundo\App\Backup\Site;


use Nemundo\App\Backup\Page\BackupPage;
use Nemundo\Web\Site\AbstractSite;

class BackupSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->title = 'Backup';
        $this->url = 'backup';
        new DownloadSite($this);
    }


    public function loadContent()
    {
        (new BackupPage())->render();
    }

}