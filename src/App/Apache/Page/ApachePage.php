<?php


namespace Nemundo\App\Apache\Page;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\App\Apache\ApacheConfig;
use Nemundo\App\Apache\Com\ApacheForm;
use Nemundo\App\Apache\Parameter\FilenameParameter;
use Nemundo\App\Apache\Site\ConfigDeleteSiteOld;
use Nemundo\App\Linux\Ssh\SftpUploadFile;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Core\Type\Text\Html;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Paranautik\Ssh\ParanautikTestSshConnection;

class ApachePage extends AbstractTemplateDocument
{

    public function getContent()
    {

        $layout = new BootstrapTwoColumnLayout($this);

        //$path = '/etc/apache2/sites-enabled/';

        $sftp = new SftpUploadFile();
        $sftp->connection = new ParanautikTestSshConnection();
        //$sftp->sourceFilename = $filename;
        //$sftp->destinationFilename= '/etc/apache2/sites-enabled/'.$this->serverName->getValue().'.conf';
        //$sftp->destinationFilename= '/srv/test1';
        //$sftp->content=$content;
        //$sftp->uploadFile();


        //$list=$sftp->getFileList($path);

        //(new Debug())->write($list);

        $table = new AdminClickableTable($layout->col1);
        foreach ($sftp->getFileList(ApacheConfig::$configPath) as $filename) {
            $row = new BootstrapClickableTableRow($table);
            $row->addText($filename);


            $row->addText((new Html(null))->importHtml( $sftp->getTextFileContent(ApacheConfig::$configPath . $filename))->getValue());


            $site=clone(ConfigDeleteSiteOld::$site);
            $site->addParameter(new FilenameParameter($filename));
            $row->addIconSite($site);

        }


        $form = new ApacheForm($layout->col2);



        return parent::getContent();

    }

}