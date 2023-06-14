<?php

namespace Nemundo\App\Notification\Page;

use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\App\Notification\Data\Notification\NotificationPaginationReader;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Db\Sql\Order\SortOrder;

class NotificationPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);

        $table = new AdminTable($layout);

        $reader = new NotificationPaginationReader();
        $reader->model->loadUser();
        $reader->addOrder($reader->model->id,SortOrder::DESCENDING);

        $header = new AdminTableHeader($table);
        $header->addText($reader->model->user->label);
        $header->addText($reader->model->dateTime->label);
        $header->addText($reader->model->message->label);



        foreach ($reader->getData() as $notificationRow) {

            $row = new AdminTableRow($table);
            $row->addText($notificationRow->user->login);
            $row->addText($notificationRow->dateTime->getShortDateTimeLeadingZeroFormat());
            $row->addText($notificationRow->message);


        }



        return parent::getContent();
    }
}