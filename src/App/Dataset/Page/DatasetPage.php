<?php

namespace Nemundo\App\Dataset\Page;

use Nemundo\App\Dataset\Com\Container\DatasetContainer;
use Nemundo\Com\Template\AbstractTemplateDocument;

class DatasetPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        new DatasetContainer($this);

        return parent::getContent();

    }
}