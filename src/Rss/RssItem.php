<?php

namespace Nemundo\Rss;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\DateTime\Date;

class RssItem extends AbstractBase
{

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $url;

    /**
     * @var Date
     */
    public $date;

    /**
     * @var string
     */
    public $enclosureUrl;

    /**
     * @var string
     */
    public $enclosureType;

}