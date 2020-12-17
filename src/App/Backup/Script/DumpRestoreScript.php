<?php

namespace Nemundo\App\Backup\Script;


use Nemundo\App\Backup\Parameter\FileParameter;
use Nemundo\App\Backup\Path\BackupPath;
use Nemundo\App\Backup\Path\RestorePath;
use Nemundo\App\Backup\Site\DownloadSite;
use Nemundo\App\DbAdmin\Connection\RestoreConnection;
use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Core\Console\ConsoleInput;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\File\DirectoryReader;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Path\Path;
use Nemundo\Core\Type\File\File;
use Nemundo\Db\Provider\MySql\Dump\MySqlDump;
use Nemundo\Db\Provider\MySql\Dump\MySqlDumpRestore;
use Nemundo\Dev\Deployment\DeploymentConfig;
use Nemundo\Dev\Deployment\StagingEnvironment;
use Nemundo\Project\Path\TmpPath;
use Nemundo\Project\ProjectConfig;


class DumpRestoreScript extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'backup-restore';
    }


    public function run()
    {

        if (DeploymentConfig::$stagingEnviroment == StagingEnvironment::PRODUCTION) {
            (new Debug())->write('You are on the production system !!!');
            exit;
        }

        //(new Debug())->write('Maybe you want to run Clean Script');


        $n=1;

        $fileList=[];


        (new Debug())->write('Delete all Files [0]');


        $reader=new DirectoryReader();
        $reader->path=(new RestorePath())->getPath();
        foreach ($reader->getData() as $file) {

            /*$row=new TableRow($table);
            $row->addText($file->filename);
            $row->addText($file->getFileSize());

            $site=clone(DownloadSite::$site);
            $site->addParameter(new FileParameter($file->filename));
            $row->addSite($site);*/

            (new Debug())->write($file->filename.' ['.$n.']');
            $fileList[$n]=$file->filename;

            $n++;

        }


        $input=new ConsoleInput();
        $input->message='File?';
        $input->defaultValue=1;
        $n=$input->getValue();

        if ($n == '0') {
            (new RestorePath())->emptyDirectory();
        }


        $dumpFilename = $fileList[$n];




        $filename = (new RestorePath())
            ->addPath($dumpFilename)
            ->getFilename();

        /*$dump = new MySqlDump();
        //$dump->connection = new RestoreConnection();
        $dump->dumpFilename = $filename;
        $dump->createDumpFile();*/


        (new Debug())->write($filename);
        exit;


        $file = new File($filename);

        if ($file->fileExists()) {

            $restore = new MySqlDumpRestore();
            $restore->filename = $filename;
            $restore->restoreDumpFile();

            //(new File($filename))->deleteFile();
            (new Debug())->write('Maybe you have to run setup');

        } else {

            (new LogMessage())->writeError('Dump File does not exist');

        }

    }

}