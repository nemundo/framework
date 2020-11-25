<?php


namespace Nemundo\App\Apache\Com;


use Nemundo\App\Apache\Builder\ApacheConfigBuilder;
use Nemundo\App\Linux\Ssh\SftpUploadFile;
use Nemundo\App\Linux\Ssh\SshConnection;
use Nemundo\Core\Debug\Debug;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Paranautik\Ssh\ParanautikTestSshConnection;

class ApacheForm extends BootstrapForm
{

    /**
     * @var SshConnection
     */
    public $connection;

    /**
     * @var BootstrapTextBox
     */
    private $serverName;

    /**
     * @var BootstrapTextBox
     */
    private $path;

    public function getContent()
    {

        $this->serverName = new BootstrapTextBox($this);
        $this->serverName->label = 'Server Name';
        $this->serverName->value = 'test123';

        $this->path = new BootstrapTextBox($this);
        $this->path->label = 'Path';
        $this->path->value = '/srv/web/test123/web';

        return parent::getContent();

    }


    protected function onSubmit()
    {

        $builder = new ApacheConfigBuilder();
        $builder->serverName = $this->serverName->getValue();
        $builder->path = $this->path->getValue();
        $content = $builder->getContent();

        (new Debug())->write($content);

        $sftp = new SftpUploadFile();
        $sftp->connection =$this->connection;
        $sftp->destinationFilename = '/etc/apache2/sites-enabled/' . $this->serverName->getValue() . '.conf';
        $sftp->content = $content;
        $sftp->uploadFile();


        exit;




    }


}