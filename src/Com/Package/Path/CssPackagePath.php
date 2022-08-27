<?php

namespace Nemundo\Com\Package\Path;

class CssPackagePath extends PackagePath
{

    protected function loadPath()
    {
        parent::loadPath();
        $this->addPath('css');
    }

}