<?php


namespace Nemundo\App\Backup\Site;


use Nemundo\App\Backup\Parameter\FileParameter;
use Nemundo\App\Backup\Path\BackupPath;
use Nemundo\Core\Http\Response\FileResponse;
use Nemundo\Web\Site\AbstractSite;

class DownloadSite extends AbstractSite
{

    /**
     * @var DownloadSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Download';
        $this->url = 'download';
        DownloadSite::$site = $this;
    }


    public function loadContent()
    {

        $response = new FileResponse();
        $response->filename = (new BackupPath())
            ->addPath((new FileParameter())->getValue())
            ->getFullFilename();
        $response->sendResponse();

    }

}