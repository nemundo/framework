<?php

namespace Nemundo\App\Backup\Com\Form;

use Nemundo\Admin\Com\Form\AbstractAdminForm;
use Nemundo\Admin\Com\ListBox\AdminFileUpload;
use Nemundo\App\Backup\Data\Backup\BackupReader;
use Nemundo\App\Backup\Path\ImportBackupPath;

class BackupImportForm extends AbstractAdminForm
{

    public $backupId;

    /**
     * @var AdminFileUpload
     */
    private $file;


    public function getContent()
    {

        $this->file = new AdminFileUpload($this);
        $this->file->label = 'File';

        return parent::getContent();

    }


    protected function onSubmit()
   {

       $filename = $this->file->getFileRequest()->filename;
       $this->file->getFileRequest()->saveAsOrginalFilename((new ImportBackupPath())->getPath());

       $backup = (new BackupReader())->getRowById($this->backupId)->getBackup();
       $backup->filename = $filename;
       $backup->import();

       exit;

   }

}