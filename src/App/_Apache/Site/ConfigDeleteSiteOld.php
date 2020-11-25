<?php


namespace Nemundo\App\Apache\Site;


use Nemundo\App\Apache\ApacheConfig;
use Nemundo\App\Apache\Parameter\FilenameParameter;
use Nemundo\App\Linux\Ssh\SftpUploadFile;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;
use Nemundo\Core\Http\Url\UrlReferer;
use Paranautik\Ssh\ParanautikTestSshConnection;

class ConfigDeleteSiteOld extends AbstractDeleteIconSite
{

    /**
     * @var ConfigDeleteSiteOld
     */
    public static $site;

    protected function loadSite()
    {

        parent::loadSite();
        ConfigDeleteSiteOld::$site = $this;

    }


    public function loadContent()
    {

        $filename = ApacheConfig::$configPath . (new FilenameParameter())->getValue();

        $sftp = new SftpUploadFile();
        //$sftp->connection = new ParanautikTestSshConnection();
        $sftp->deleteFilename($filename);

        (new UrlReferer())->redirect();

    }

}