<?php

namespace Nemundo\Office\Word\Document;

use Nemundo\Core\Base\AbstractBase;

class WordTableCell extends AbstractBase
{


    public $text;

    public $bold = false;

    public $fontSize = null;

    /**
     * @var bool
     */
    public $noWarp = false;


    public $widthInMillimeter;


    /*public function __construct(?AbstractWordDocument $document=null)
    {

        if ($document !== null) {
            $document->addWordTableCell($this);
        }

    }*/


}