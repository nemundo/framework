<?php

namespace Nemundo\Project\Deployment;

use Nemundo\App\Git\Command\GitCloneCommand;
use Nemundo\App\Git\Command\GitCommitCommand;
use Nemundo\App\Git\Command\GitPullCommand;
use Nemundo\App\Git\Command\GitPushCommand;
use Nemundo\App\Git\Command\GitTagCommand;
use Nemundo\App\Git\Command\LatestGitTag;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\CoreRepository;
use Nemundo\Core\File\DirectoryReader;
use Nemundo\Core\Path\Path;
use Nemundo\Core\Repository\AbstractRepository;
use Nemundo\Project\Deployment\Copy\ProjectCopy;
use Nemundo\Project\Deployment\Github\GithubBuilder;
use Nemundo\Project\Deployment\Path\DeploymentPath;

abstract class AbstractPublicRepositoryDeployment extends AbstractBase
{

    /**
     * @var AbstractRepository
     */
    protected $repository;


    protected $githubShortUrl;


    abstract protected function loadDeployment();


    public function __construct() {

        $this->loadDeployment();
    }



    public function removeAllTags() {

        $tag = new LatestGitTag();
        $tag->path =$deploymentPath = (new DeploymentPath())
            ->addPath($this->repository->projectName)
            ->getPath();

        $tag->deleteAllTag();

    }



    protected function getDeploymentPath() {





    }


    public function deploy() {

        $deploymentPath = (new DeploymentPath())
            ->addPath($this->repository->projectName);

        $gitUrl = (new GithubBuilder())->getGitUrl($this->githubShortUrl);

        if ($deploymentPath->existPath()) {

            $pull = new GitPullCommand();
            $pull->path = $deploymentPath->getPath();
            $pull->showOutput = true;
            $pull->runCommand();

        } else {

            $gitClone = new GitCloneCommand();
            $gitClone->gitUrl = $gitUrl;
            $gitClone->path = $deploymentPath->getPath();
            $gitClone->showOutput = true;
            $gitClone->runCommand();

        }


        $reader = new DirectoryReader();
        $reader->path = $deploymentPath->getPath();
        $reader->includeDirectories = true;
        $reader->includeFiles = true;
        foreach ($reader->getData() as $file) {

            if ($file->isDirectory()) {
                if (($file->getFilename() !== '.git') && ($file->getFilename() !== '.idea')) {
                    (new Path($file->getFullFilename()))->deleteDirectory();
                }
            }

            if ($file->isFile()) {
                $file->deleteFile();
            }

        }


        $copy = new ProjectCopy();
        $copy->path = $deploymentPath;
        $copy->copyProject($this->repository);

        $commit = new GitCommitCommand();
        $commit->path = $deploymentPath->getPath();
        $commit->runCommand();

        $push = new GitPushCommand();
        $push->path = $deploymentPath->getPath();
        $push->runCommand();

        $tag = new LatestGitTag();
        $tag->path = $deploymentPath->getPath();
        $version = $tag->getLatestTag();
        $version++;

        $tag = new GitTagCommand();
        $tag->path = $deploymentPath->getPath();
        $tag->tag =$version;
        $tag->runCommand();




    }

}