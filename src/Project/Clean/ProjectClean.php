<?php

namespace Nemundo\Project\Clean;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Db\Provider\MySql\Database\MySqlDatabase;
use Nemundo\Model\Path\DataPath;
use Nemundo\Model\Path\RedirectDataPath;

class ProjectClean extends AbstractBase
{

    public function cleanProject() {

        (new DataPath())
            ->emptyDirectory();

        (new RedirectDataPath())
            ->emptyDirectory();

        (new MySqlDatabase())
            ->emptyDatabase();

    }

}