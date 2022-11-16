<?php

namespace Nemundo\App\Dataset\Type;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Web\Site\AbstractSite;

abstract class AbstractDataset extends AbstractBaseClass
{

    public $dataset;

    public $description;

    public $url;

    public $documentationUrl;

    public $licence;

    public $licenceUrl;

    public $useCommercialPurpose = false;

    public $category;

    public $organisation;

    public $dateOfPublication;


    /**
     * @var AbstractSite
     */
    public $site;


    abstract protected function loadDataset();

    public function __construct()
    {

        $this->loadDataset();

    }

}