<?php

namespace Nemundo\App\Git\Command;

use Nemundo\Core\Command\AbstractCommand;
use Nemundo\Project\Deployment\Github\GithubBuilder;

class GithubCloneCommand extends AbstractCommand
{

    public $githubShortUrl;

    public function getCommandList()
    {

        $url = (new GithubBuilder())->getGitUrl($this->githubShortUrl);
        $this->addCommandLine('git clone ' . $url);

        return parent::getCommandList();

    }

}