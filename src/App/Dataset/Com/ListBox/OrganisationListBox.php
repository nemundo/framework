<?php

namespace Nemundo\App\Dataset\Com\ListBox;

use Nemundo\Admin\Com\ListBox\AdminListBox;
use Nemundo\App\Dataset\Reader\OrganisationDataReader;

class OrganisationListBox extends AdminListBox
{
    public function getContent()
    {
        $this->label = 'Organisation';

        foreach ((new OrganisationDataReader())->getData() as $organisationRow) {
            $this->addItem($organisationRow->id, $organisationRow->organisation);
        }

        return parent::getContent();
    }
}