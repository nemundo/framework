<?php

namespace Nemundo\App\Manifest\Page;

use Nemundo\App\Manifest\Com\Form\ManifestBuilderForm;
use Nemundo\Com\Template\AbstractTemplateDocument;

class ManifestPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        new ManifestBuilderForm($this);

        return parent::getContent();
    }
}