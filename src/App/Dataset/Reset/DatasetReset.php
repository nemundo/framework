<?php

namespace Nemundo\App\Dataset\Reset;

use Nemundo\App\Dataset\Data\Dataset\DatasetDelete;
use Nemundo\App\Dataset\Data\Dataset\DatasetUpdate;
use Nemundo\Project\Reset\AbstractReset;

class DatasetReset extends AbstractReset
{

    public function reset()
    {

        $update = new DatasetUpdate();
        $update->setupStatus = false;
        $update->update();

    }


    public function remove()
    {

        $delete = new DatasetDelete();
        $delete->filter->andEqual($delete->model->setupStatus, false);
        $delete->delete();

    }

}