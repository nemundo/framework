<?php

namespace Nemundo\App\Dataset\Reset;

use Nemundo\App\Dataset\Data\Category\CategoryDelete;
use Nemundo\App\Dataset\Data\Category\CategoryReader;
use Nemundo\App\Dataset\Data\Dataset\DatasetCount;
use Nemundo\App\Dataset\Data\Dataset\DatasetDelete;
use Nemundo\App\Dataset\Data\Dataset\DatasetUpdate;
use Nemundo\App\Dataset\Data\Organisation\OrganisationDelete;
use Nemundo\App\Dataset\Data\Organisation\OrganisationReader;
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


        $reader = new CategoryReader();
        foreach ($reader->getData() as $row) {

            $count = new DatasetCount();
            $count->filter->andEqual($count->model->categoryId, $row->id);
            if ($count->getCount() == 0) {
                (new CategoryDelete())->deleteById($row->id);
            }

        }

        $reader = new OrganisationReader();
        foreach ($reader->getData() as $row) {

            $count = new DatasetCount();
            $count->filter->andEqual($count->model->organisationId, $row->id);
            if ($count->getCount() == 0) {
                (new OrganisationDelete())->deleteById($row->id);
            }

        }


    }

}