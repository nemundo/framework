<?php

namespace Nemundo\App\Script\Reader;

use Nemundo\App\Script\Data\Script\ScriptReader;

class ScriptDataReader extends ScriptReader
{

    public $applicationId;

    public function getData()
    {

        if ($this->applicationId !== null) {
            $this->filter->andEqual($this->model->applicationId, $this->applicationId);
        }

        $this->addOrder($this->model->scriptName);

        return parent::getData();

    }

}