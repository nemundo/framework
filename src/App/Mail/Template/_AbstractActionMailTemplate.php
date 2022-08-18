<?php

namespace Nemundo\App\Mail\Template;

use Nemundo\Html\Document\AbstractHtmlDocument;
use Nemundo\Web\Site\AbstractSite;

class _AbstractActionMailTemplate extends AbstractHtmlDocument
{

    /**
     * @var string
     */
    public $actionText;

    /**
     * @var string
     */
    public $actionLabel = 'View';

    /**
     * @var string
     */
    public $actionUrl;  // = '#';


    /**
     * @var AbstractSite
     */
    public $actionSite;



}