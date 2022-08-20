<?php

namespace Nemundo\App\Help\Reader;

use Nemundo\App\Help\Data\Project\ProjectReader;

class ProjectDataReader extends ProjectReader
{

    public function getData()
    {
        $this->addOrder($this->model->project);
        return parent::getData();
    }

}