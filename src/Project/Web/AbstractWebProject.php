<?php

namespace Nemundo\Project\Web;


// AbstractWebHost
// AbstractWebPath
use Nemundo\Core\Base\AbstractBase;

abstract class AbstractWebProject extends AbstractBase
{

    public $webPath;

    public $webUrl = '/';

    abstract protected function loadWeb();

    public function __construct() {
        $this->loadWeb();
    }





}