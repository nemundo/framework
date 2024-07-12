<?php

namespace Nemundo\App\Backup\Type;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\App\Backup\Path\BackupPath;
use Nemundo\App\Backup\Path\ExportBackupPath;
use Nemundo\App\Backup\Path\ImportBackupPath;
use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Json\Document\JsonDocument;
use Nemundo\Core\Json\Reader\JsonReader;
use Nemundo\User\Builder\UserBuilder;
use Nemundo\User\Password\PasswordChange;

abstract class AbstractBackup extends AbstractBaseClass
{

    /**
     * @var AbstractApplication
     */
    protected $application;

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

        $path = new ExportBackupPath();

        if ($this->application!==null) {
            $path->addPath($this->application->applicationName);
        }

        $path->createPath();

        $fullFilename = $json->writeFile($path->getPath());

        return $fullFilename;

    }



    public function import() {


        $fullFilename = (new ImportBackupPath())
            ->addPath($this->filename)
            ->getFullFilename();

        $reader = new JsonReader();
        $reader->fromFilename($fullFilename);
        foreach ($reader->getData() as $jsonRow) {
            $this->onImport($jsonRow);
        }

    }


    protected function addExportRow($row)
    {

        $this->exportList[] = $row;
        return $this;

    }

}