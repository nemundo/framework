<?php

namespace Nemundo\App\Backup\Export;

use Nemundo\App\Backup\Data\Backup\BackupReader;
use Nemundo\App\Backup\Path\ExportBackupPath;
use Nemundo\App\Backup\Path\ZipBackupPath;
use Nemundo\Core\Archive\ZipArchive;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\File\File;
use Nemundo\Core\System\PhpConfig;

class BackupExport extends AbstractBase
{

    public function export() {

        (new PhpConfig())->setUnlimitedMemoryLimit();

        $reader = new BackupReader();
        foreach ($reader->getData() as $backupRow) {
            $backupRow->getBackup()->export();
        }

        $zipPath = new ZipBackupPath();
        $zipPath->createPath();

        $filename = $zipPath
            ->addPath('backup.zip')
            ->getFullFilename();

        $file = new File($filename);
        if ($file->fileExists()) {
            $file->deleteFile();
        }

        $zip = new ZipArchive();
        $zip->archiveFilename = $filename;
        $zip->addPath((new ExportBackupPath())->getPath());
        $zip->createArchive();


    }

}