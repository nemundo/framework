<?php

namespace Nemundo\Model\Type\DateTime;


use Nemundo\Model\Item\DateTime\DateTimeModelItem;

class CreatedDateTimeType extends DateTimeType
{

    protected function loadExternalType()
    {

        parent::loadExternalType();

        $this->visible->form = false;

        $this->fieldName = 'created_date_time';
        $this->label = 'Created Date/Time';

        //$this->viewItemClassName = DateTimeModelItem::class;
        //$this->tableItemClassName = DateTimeModelItem::class;

        //$this->dataPropertyClassName = null;

    }

}