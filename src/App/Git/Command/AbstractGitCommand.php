<?php

namespace Nemundo\App\Git\Command;

use Nemundo\Core\Command\AbstractLocalCommand;

abstract class AbstractGitCommand extends AbstractLocalCommand
{

    public $path;


    public function __construct()
    {

        parent::__construct();

        $this->showOutput=true;

    }


}