<?php

namespace Nemundo\App\Git\Command;

use Nemundo\Core\Debug\Debug;

class LatestGitTag extends AbstractGitCommand
{


    public function getTagList()
    {


        $this->clearCommand();
        $this->addCommandLine('cd ' . $this->path);
        $this->addCommandLine('git tag -l');

        $output = $this->runCommand();

        //(new Debug())->write($output);

        return $output;


    }


    public function getLatestTag()
    {


        /*$this->clearCommand();
        $this->addCommandLine('cd ' . $this->path);
        $this->addCommandLine('git describe --tags --abbrev=0');

        $output = $this->runCommand();*/

        $this->showOutput=false;
        $output = $this->getTagList();

        $version=0;
        if (sizeof($output)>0) {
            $version = end($output);
        }


        return $version;

        //(new Debug())->write($output);

        //return $output[0];


    }


    public function deleteTag($tag)
    {

        $this->clearCommand();
        $this->addCommandLine('cd ' . $this->path);
        $this->addCommandLine('git tag -d ' . $tag);

        $this->addCommandLine('git push --delete origin ' . $tag);

//        git push --delete origin tagname


        $this->runCommand();

        return $this;

        //$output = $this->runCommand();

        //git tag -d <tag_name>


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