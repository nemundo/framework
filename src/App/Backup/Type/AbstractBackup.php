<?php

namespace Nemundo\App\Backup\Type;

use Nemundo\App\Backup\Path\BackupPath;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Base\AbstractBaseClass;

abstract class AbstractBackup extends AbstractBaseClass
{

    public $filename;


    public function __construct()
    {
        $this->loadBackup();
    }


    abstract protected function loadBackup();


    //abstract public function loadBackup();

    abstract public function export();


    abstract public function import();


    protected function getFullFilename()
    {

        (new BackupPath())->createPath();

        $fullFilename = (new BackupPath())
            ->addPath($this->filename)
            ->getFullFilename();

        return $fullFilename;

    }


}