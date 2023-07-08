<?php

namespace Nemundo\App\Backup\Type;

use Nemundo\App\Backup\Path\BackupPath;
use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Json\Document\JsonDocument;

abstract class AbstractBackup extends AbstractBaseClass
{

    public $filename;

    private $exportList = [];


    public function __construct()
    {
        $this->loadBackup();
    }


    abstract protected function loadBackup();


    abstract protected function loadExport();


    abstract public function import();


    public function export()
    {

        $json = new JsonDocument();
        $json->filename = $this->filename;

        $this->loadExport();

        $json->setData($this->exportList);
        $json->writeFile((new BackupPath())->getPath());

    }


    protected function addExportRow($row)
    {

        $this->exportList[] = $row;
        return $this;

    }


    protected function getFullFilename()
    {

        (new BackupPath())->createPath();

        $fullFilename = (new BackupPath())
            ->addPath($this->filename)
            ->getFullFilename();

        return $fullFilename;

    }

}