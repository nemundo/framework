<?php

namespace Nemundo\Project\Deployment;

use Nemundo\App\Git\Command\GitCloneCommand;
use Nemundo\App\Git\Command\GitCommitCommand;
use Nemundo\App\Git\Command\GitPullCommand;
use Nemundo\App\Git\Command\GitPushCommand;
use Nemundo\App\Git\Command\GitTagCommand;
use Nemundo\App\Git\Command\LatestGitTag;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\File\DirectoryCopy;
use Nemundo\Core\File\DirectoryReader;
use Nemundo\Core\Path\Path;
use Nemundo\Core\Repository\AbstractRepository;
use Nemundo\Project\Deployment\Copy\ProjectCopy;
use Nemundo\Project\Deployment\Github\GithubBuilder;
use Nemundo\Project\Deployment\Path\DeploymentPath;
use Nemundo\Project\Path\ProjectPath;

abstract class AbstractPublicRepositoryDeployment extends AbstractBase
{

    /**
     * @var AbstractRepository
     */
    protected $repository;


    protected $githubShortUrl;


    abstract protected function loadDeployment();


    public function __construct()
    {

        $this->loadDeployment();
    }


    public function removeAllTags()
    {

        $tag = new LatestGitTag();
        $tag->path = $this->getDeploymentPath()
            ->getPath();

        $tag->deleteAllTag();

    }


    protected function getDeploymentPath()
    {

        $path = (new DeploymentPath())
            ->addPath($this->repository->projectName);

        return $path;

    }


    public function deploy()
    {

        $deploymentPath = $this->getDeploymentPath();
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

        $this
            ->copyPackageFile('css')
            ->copyPackageFile('js');


        $commit = new GitCommitCommand();
        $commit->path = $deploymentPath->getPath();
        $commit->runCommand();

        $push = new GitPushCommand();
        $push->path = $deploymentPath->getPath();
        $push->runCommand();

        $this->updateTag();

    }


    public function updateTag() {

        $deploymentPath = $this->getDeploymentPath();

        $tag = new LatestGitTag();
        $tag->path = $deploymentPath->getPath();
        $version = $tag->getLatestTag();
        $version++;

        $tag = new GitTagCommand();
        $tag->path = $deploymentPath->getPath();
        $tag->tag = $version;
        $tag->runCommand();

    }


    public function copyPackageFile($type)
    {

        $path = (new ProjectPath())
            ->addPath('package')
            ->addPath($type)
            ->addPath($this->repository->projectName);

        $webPath = $this->getDeploymentPath()
            ->addPath('package')
            ->addPath($this->repository->projectName)
            ->addPath($type);

        $webPath->createPath();

        if ($path->existPath()) {

            $copy = new DirectoryCopy();
            $copy->overwriteExistingFile = true;
            $copy->sourcePath = $path->getPath();
            $copy->destinationPath = $webPath->getPath();
            $copy->copyDirectory();

        }

        return $this;

    }

}