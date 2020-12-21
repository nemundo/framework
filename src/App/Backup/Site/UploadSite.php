<?php


namespace Nemundo\App\Backup\Site;


use Nemundo\App\Backup\Parameter\FileParameter;
use Nemundo\App\Backup\Path\BackupPath;
use Nemundo\App\Backup\Path\DumpBackupPath;
use Nemundo\App\Backup\Path\RestoreBackupPath;
use Nemundo\Core\Archive\ZipExtractor;
use Nemundo\Core\Http\Response\FileResponse;
use Nemundo\Core\Type\File\File;
use Nemundo\Package\Dropzone\DropzoneFileRequest;
use Nemundo\Web\Site\AbstractSite;

class UploadSite extends AbstractSite
{

    /**
     * @var UploadSite
     */
    public static $site;

    protected function loadSite()
    {
        //$this->title = 'Download';
        $this->url = 'upload';
        UploadSite::$site = $this;
    }


    public function loadContent()
    {


        (new RestoreBackupPath())->createPath();

        $fileRequest = new DropzoneFileRequest();   // $this->file->getFileRequest();
        $filename = $fileRequest->saveAsOrginalFilename((new RestoreBackupPath())->getPath());


        //(new Debug())->write($filename);


        $zip = new ZipExtractor();
        $zip->archiveFilename = $filename;  // (new UploadRestoreFilename())->getFilename();  // $zipFilename;
        $zip->extractPath = (new RestoreBackupPath())->getPath();
        $zip->extract();

        (new File($filename))->deleteFile();


    }

}