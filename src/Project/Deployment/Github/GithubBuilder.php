<?php

namespace Nemundo\Project\Deployment\Github;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Project\Deployment\DeploymentConfig;

class GithubBuilder extends AbstractBase
{

    public function getGitUrl($githubShortUrl)
    {

        $url = 'https://' . DeploymentConfig::$token . '@github.com/' . $githubShortUrl.'.git';
        return $url;

    }

}