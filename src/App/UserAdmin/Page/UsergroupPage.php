<?php

namespace Nemundo\App\UserAdmin\Page;

use Nemundo\Admin\Com\Form\AdminSearchForm;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\App\UserAdmin\Com\Tab\UserAdminTab;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\User\Data\Usergroup\UsergroupReader;

class UsergroupPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);
        new UserAdminTab($layout);

        $usergroupReader = new UsergroupReader();
        $usergroupReader->addOrder($usergroupReader->model->usergroup);

        $table = new AdminTable($layout);

        $header = new TableHeader($table);
        $header->addText($usergroupReader->model->id->label);
        $header->addText($usergroupReader->model->usergroup->label);

        foreach ($usergroupReader->getData() as $usergroupRow) {
            $row = new AdminTableRow($table);
            $row->addText($usergroupRow->id);
            $row->addText($usergroupRow->usergroup);
        }


        return parent::getContent();
    }
}