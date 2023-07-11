<?php

namespace Nemundo\App\UserAdmin\Site\Export;

use Nemundo\Admin\Site\AbstractExcelSite;
use Nemundo\Office\Excel\Document\ExcelDocument;
use Nemundo\Office\Excel\Reader\ExcelRow;
use Nemundo\User\Reader\User\UserDataReader;

class UserExcelExportSite extends AbstractExcelSite
{

    /**
     * @var UserExcelExportSite
     */
    public static $site;


    protected function loadSite()
    {

        $this->title = 'User Excel';
        $this->url='user-excel';

        UserExcelExportSite::$site=$this;

    }


    public function loadContent()
    {

        $excel = new ExcelDocument();
        $excel->filename='user.xlsx';

        $reader = new UserDataReader();

        $header = [];
        $header[]=$reader->model->id->fieldName;
        $header[]=$reader->model->login->fieldName;
        $header[]=$reader->model->email->fieldName;
        $header[]=$reader->model->displayName->fieldName;

        $excel->addBoldRow($header);


        foreach ($reader->getData() as $userDataRow) {

            $row = [];
            $row[$reader->model->id->fieldName] = $userDataRow->id;
            $row[$reader->model->login->fieldName] = $userDataRow->login;
            $row[$reader->model->email->fieldName] = $userDataRow->email;
            $row[$reader->model->displayName->fieldName] = $userDataRow->displayName;

        }

        $excel->render();


    }

}