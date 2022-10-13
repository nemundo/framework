<?php

namespace Nemundo\App\Dataset\Reader;

use Nemundo\App\Dataset\Data\Organisation\OrganisationReader;

class OrganisationDataReader extends OrganisationReader
{

    public function getData()
    {
        $this->addOrder($this->model->organisation);
        return parent::getData();
    }

}