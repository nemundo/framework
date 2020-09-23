<?php

namespace Nemundo\Model\Admin\Redirect;

use Nemundo\Model\Table\AbstractModelTable;
use Nemundo\Model\Table\Redirect\ModelTableRedirect;
use Nemundo\Package\FontAwesome\Icon\DeleteIcon;

class ModelDeleteRedirect extends ModelTableRedirect
{

    public function __construct(AbstractModelTable $table = null)
    {
        parent::__construct($table);
        $this->label = (new DeleteIcon())->getContent();

    }

}