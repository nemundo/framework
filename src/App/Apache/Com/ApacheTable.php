<?php


namespace Nemundo\App\Apache\Com;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\App\Apache\ApacheConfig;
use Nemundo\App\Apache\Parameter\FilenameParameter;
use Nemundo\App\Apache\Site\ConfigDeleteSiteOld;
use Nemundo\App\Linux\Ssh\SftpUploadFile;
use Nemundo\App\Linux\Ssh\SshConnection;
use Nemundo\Core\Type\Text\Html;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Paranautik\Ssh\ParanautikTestSshConnection;

class ApacheTable extends AdminTable
{

    /**
     * @var SshConnection
     */
    public $connection;


    public function getContent()
    {

        $sftp = new SftpUploadFile();
        $sftp->connection =$this->connection;
        foreach ($sftp->getFileList(ApacheConfig::$configPath) as $filename) {
            $row = new BootstrapClickableTableRow($this);
            $row->addText($filename);
            $row->addText((new Html(null))->importHtml( $sftp->getTextFileContent(ApacheConfig::$configPath . $filename))->getValue());

            $site=clone(ConfigDeleteSiteOld::$site);
            $site->addParameter(new FilenameParameter($filename));
            $row->addIconSite($site);

        }

        return parent::getContent();

    }

}