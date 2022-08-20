<?php

namespace Nemundo\App\Git\Command;

class LatestGitTag extends AbstractGitCommand
{

    public function getTagList()
    {

        $this->clearCommand();
        $this->addCommandLine('cd ' . $this->path);
        $this->addCommandLine('git tag --sort=committerdate');

        $output = $this->runCommand();

        return $output;


    }


    public function getLatestTag()
    {

        $this->showOutput = false;
        $output = $this->getTagList();

        $version = 0;
        if (sizeof($output) > 0) {
            $version = end($output);
        }

        return $version;

    }


    public function deleteTag($tag)
    {

        $this->clearCommand();
        $this->addCommandLine('cd ' . $this->path);
        $this->addCommandLine('git tag -d ' . $tag);
        $this->addCommandLine('git push --delete origin ' . $tag);

        $this->runCommand();

        return $this;

    }


    // removeAllTags
    public function deleteAllTag()
    {

        foreach ($this->getTagList() as $tag) {
            $this->deleteTag($tag);
        }

        return $this;

    }

}