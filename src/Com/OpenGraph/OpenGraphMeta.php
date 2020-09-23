<?php

namespace Nemundo\Com\OpenGraph;


use Nemundo\Html\Header\Meta;

class OpenGraphMeta extends Meta
{

    /**
     * @var string
     */
    public $property;

    /**
     * @var string
     */
    public $content;


    public function getContent()
    {

        $this->addAttribute('property', 'og:'.$this->property);
        $this->addAttribute('content', $this->content);

        return parent::getContent();

    }

}