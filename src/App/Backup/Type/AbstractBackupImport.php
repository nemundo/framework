<?php

namespace Nemundo\App\Backup\Type;

use Nemundo\Core\Base\AbstractBase;

abstract class AbstractBackupImport extends AbstractBase
{

    abstract public function import();

}