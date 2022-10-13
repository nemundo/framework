<?php

namespace Nemundo\App\Dataset\Com\ListBox;

use Nemundo\Admin\Com\ListBox\AdminListBox;
use Nemundo\App\Dataset\Reader\CategoryDataReader;

class CategoryListBox extends AdminListBox
{
    public function getContent()
    {
        $this->label = 'Category';

        foreach ((new CategoryDataReader())->getData() as $categoryRow) {
            $this->addItem($categoryRow->id,$categoryRow->category);
        }

        return parent::getContent();
    }
}