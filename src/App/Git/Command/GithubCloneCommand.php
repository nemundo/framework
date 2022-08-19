<?php

namespace Nemundo\App\Git\Command;

use Nemundo\Core\Command\AbstractCommand;
use Nemundo\Project\Deployment\DeploymentConfig;
use Nemundo\Project\Deployment\Github\GithubBuilder;

class GithubCloneCommand extends AbstractCommand
{

    public $githubShortUrl;

    public function getCommandList()
    {

        $url = (new GithubBuilder())->getGitUrl($this->githubShortUrl);
//        $this->deploymentGitUrl = 'https://' . DeploymentConfig::$token . '@github.com/' . $this->githubShortUrl;
         $this->addCommandLine('git clone ' . $url);  // . ' ' . $this->path);

        return parent::getCommandList();

    }


}