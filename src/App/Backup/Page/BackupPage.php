<?php


namespace Nemundo\App\Backup\Page;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\App\Backup\Com\Form\UploadForm;
use Nemundo\App\Backup\Parameter\FileParameter;
use Nemundo\App\Backup\Path\BackupPath;
use Nemundo\App\Backup\Site\DownloadSite;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Core\File\DirectoryReader;

class BackupPage extends AbstractTemplateDocument
{

    public function getContent()
    {

        new UploadForm($this);

        $table=new AdminTable($this);

        $header=new TableHeader($table);
        $header->addText('File');
        $header->addText('Size');
        $header->addEmpty();

        $reader=new DirectoryReader();
        $reader->path=(new BackupPath())->getPath();
        foreach ($reader->getData() as $file) {

            $row=new TableRow($table);
            $row->addText($file->filename);
            $row->addText($file->getFileSize());

            $site=clone(DownloadSite::$site);
            $site->addParameter(new FileParameter($file->filename));
            $row->addSite($site);

        }

        return parent::getContent();

    }

}