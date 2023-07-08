<?php

namespace Nemundo\App\Backup\Type;

use Nemundo\App\Backup\Path\BackupPath;
use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Json\Document\JsonDocument;
use Nemundo\Core\Json\Reader\JsonReader;
use Nemundo\User\Builder\UserBuilder;
use Nemundo\User\Password\PasswordChange;

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


    abstract protected function onImport($jsonRow);


    public function export()
    {

        $json = new JsonDocument();
        $json->filename = $this->filename;
        $json->overwriteExistingFile = true;

        $this->loadExport();

        $json->setData($this->exportList);
        $json->writeFile((new BackupPath())->getPath());

    }



    public function import() {

        $reader = new JsonReader();
        $reader->fromFilename($this->getFullFilename());
        foreach ($reader->getData() as $jsonRow) {
            $this->onImport($jsonRow);
        }

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