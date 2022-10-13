<?php

namespace Nemundo\App\Dataset\Reader;

use Nemundo\App\Dataset\Data\Category\CategoryReader;

class CategoryDataReader extends CategoryReader
{

    public function getData()
    {
        $this->addOrder($this->model->category);
        return parent::getData();
    }

}