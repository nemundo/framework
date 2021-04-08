<?php


namespace Nemundo\App\Manifest\Com;


use Nemundo\Html\Header\Link\AbstractLink;

class WebManifestLink extends AbstractLink
{

    public function getContent()
    {

        $this->rel = 'manifest';
        $this->href = '/webmanifest.json';

        return parent::getContent();

    }

}