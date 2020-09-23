<?php


namespace Nemundo\App\Apache\Com;


use Nemundo\App\Apache\Builder\ApacheConfigBuilder;
use Nemundo\App\Linux\Ssh\SftpUploadFile;
use Nemundo\Core\Debug\Debug;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Paranautik\Ssh\ParanautikTestSshConnection;

class ApacheForm extends BootstrapForm
{

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
        $sftp->connection = new ParanautikTestSshConnection();
        $sftp->destinationFilename = '/etc/apache2/sites-enabled/' . $this->serverName->getValue() . '.conf';
        $sftp->content = $content;
        $sftp->uploadFile();


        exit;


        /*

        $sftp = new \Net_SFTP('www.domain.tld');
        if (!$sftp->login('username', 'password')) {
            exit('Login Failed');
        }

// puts a three-byte file named filename.remote on the SFTP server
        $sftp->put('filename.remote', 'xxx');
// puts an x-byte file named filename.remote on the SFTP server,
// where x is the size of filename.local
        $sftp->put('filename.remote', 'filename.local', SFTP::SOURCE_LOCAL_FILE);
*/


    }


}