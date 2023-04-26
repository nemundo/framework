<?php

namespace Nemundo\App\Mail\Message\Attachment;

use Nemundo\Core\Base\AbstractBase;

abstract class AbstractInlineImageAttachment extends AbstractBase
{

    public $cid;

    public $filename;

    abstract protected function loadInlineImage();

    public function __construct() {

        $this->loadInlineImage();

    }


    public function getSrc() {

        $src = 'cid:'.$this->cid;
        return $src;

    }



}