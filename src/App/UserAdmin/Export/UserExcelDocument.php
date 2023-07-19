<?php

namespace Nemundo\App\UserAdmin\Export;

use Nemundo\Office\Excel\Document\AbstractExcelDocument;
use Nemundo\User\Reader\User\UserDataReader;

class UserExcelDocument extends AbstractExcelDocument
{

    protected function loadDocument()
    {

        $this->filename = 'user.xlsx';

        $reader = new UserDataReader();

        $header = [];
        $header[] = $reader->model->id->fieldName;
        $header[] = $reader->model->login->fieldName;
        $header[] = $reader->model->email->fieldName;
        $header[] = $reader->model->displayName->fieldName;

        $this->addBoldRow($header);

        foreach ($reader->getData() as $userDataRow) {

            $row = [];
            $row[$reader->model->id->fieldName] = $userDataRow->id;
            $row[$reader->model->login->fieldName] = $userDataRow->login;
            $row[$reader->model->email->fieldName] = $userDataRow->email;
            $row[$reader->model->displayName->fieldName] = $userDataRow->displayName;
            $this->addRow($row);

        }


    }

}