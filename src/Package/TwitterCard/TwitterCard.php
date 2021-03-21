<?php

namespace Nemundo\Package\TwitterCard;

use Nemundo\Package\OpenGraph\AbstractOpenGraph;

class TwitterCard extends AbstractOpenGraph
{

    public function getContent()
    {

        $this->prefix = 'twitter';

        $this->addMeta('card', 'summary');
        $this->addMeta('title', $this->title);
        $this->addMeta('description', $this->description);
        $this->addMeta('image', $this->imageUrl);

        return parent::getContent();

    }

}