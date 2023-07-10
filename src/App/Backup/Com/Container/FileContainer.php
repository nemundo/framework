<?php

namespace Nemundo\App\Backup\Com\Container;

use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\App\Backup\Parameter\FileParameter;
use Nemundo\App\Backup\Site\DownloadSite;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Core\File\DirectoryReader;
use Nemundo\Core\File\FileSize;
use Nemundo\Core\Path\AbstractPath;
use Nemundo\Html\Container\AbstractHtmlContainer;

class FileContainer extends AbstractHtmlContainer
{

    public $subtitle;

    /**
     * @var AbstractPath
     */
    public $path;

    public function getContent()
    {

        $subtitle = new AdminSubtitle($this);
        $subtitle->content = $this->subtitle . ' Backup File';

        $table = new AdminTable($this);

        $header = new TableHeader($table);
        $header->addText('File');
        $header->addText('Date/Time');
        $header->addText('Size');
        $header->addEmpty();

        $reader = new DirectoryReader();
        $reader->path = $this->path->getPath();
        foreach ($reader->getData() as $file) {

            $row = new TableRow($table);
            $row->addText($file->getFilename());
            $row->addText($file->getCreateDateTime()->getIsoDateTime());
            $row->addText((new FileSize($file->getFileSize()))->getText());

            $site = clone(DownloadSite::$site);
            $site->addParameter(new FileParameter($file->getFilename()));
            $row->addSite($site);

        }
        
        return parent::getContent();

    }

}