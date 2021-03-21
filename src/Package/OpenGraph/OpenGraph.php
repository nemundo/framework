<?php

namespace Nemundo\Package\OpenGraph;


class OpenGraph extends AbstractOpenGraph
{

    public function getContent()
    {

        $this->prefix = 'og';

        $this->addMeta('title', $this->title);
        $this->addMeta('description', $this->description);
        $this->addMeta('image', $this->imageUrl);

        return parent::getContent();

    }

}