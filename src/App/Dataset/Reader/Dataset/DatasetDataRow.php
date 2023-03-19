<?php

namespace Nemundo\App\Dataset\Reader\Dataset;

use Nemundo\App\Dataset\Data\Dataset\DatasetRow;
use Nemundo\App\Dataset\Type\AbstractDataset;

// Nemundo\App\Dataset\Reader\Dataset\DatasetDataRow

class DatasetDataRow extends DatasetRow
{

    public function getDataset() {

        /** @var AbstractDataset $dataset */
        $dataset = new $this->phpClass();

        return $dataset;

    }

}