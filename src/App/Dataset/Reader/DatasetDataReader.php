<?php

namespace Nemundo\App\Dataset\Reader;

use Nemundo\App\Dataset\Data\Dataset\DatasetReader;

class DatasetDataReader extends DatasetReader
{

    public function getData()
    {

        $this->model->loadCategory();
        $this->model->loadOrganisation();

        return parent::getData();

    }

}