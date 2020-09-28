<?php

namespace Nemundo\Model\Admin\Redirect;


use Nemundo\Model\Table\AbstractModelTable;
use Nemundo\Model\Table\Redirect\ModelTableRedirect;
use Nemundo\Package\FontAwesome\FontAwesomeIcon;

class ModelActiveRedirect extends ModelTableRedirect
{

    public function __construct(AbstractModelTable $table = null)
    {
        parent::__construct($table);

        $icon = new FontAwesomeIcon();
        $icon->icon = 'eye';
        $this->label = $icon->getContent();
    }

}