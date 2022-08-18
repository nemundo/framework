<?php

namespace Nemundo\App\Scheduler\Page;

use Nemundo\Admin\Com\Pagination\AdminPagination;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\App\Scheduler\Data\Scheduler\SchedulerReader;
use Nemundo\App\Scheduler\Data\SchedulerLog\SchedulerLogCount;
use Nemundo\App\Scheduler\Data\SchedulerLog\SchedulerLogModel;
use Nemundo\App\Scheduler\Data\SchedulerLog\SchedulerLogPaginationReader;
use Nemundo\App\Scheduler\Parameter\SchedulerParameter;
use Nemundo\App\Scheduler\Status\ChanceledSchedulerStatus;
use Nemundo\App\Scheduler\Status\PlannedSchedulerStatus;
use Nemundo\App\Scheduler\Template\SchedulerTemplate;
use Nemundo\Db\Filter\Filter;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Html\Paragraph\Paragraph;

class SchedulerItemLogPage extends SchedulerTemplate
{

    public function getContent()
    {

        $schedulerId = (new SchedulerParameter())->getValue();

        $schedulerReader = new SchedulerReader();
        $schedulerReader->model->loadScript();
        $schedulerRow = $schedulerReader->getRowById($schedulerId);

        $subtitle = new AdminSubtitle($this);
        $subtitle->content = $schedulerRow->script->scriptClass;


        $model = new SchedulerLogModel();
        $filter = new Filter();
        $filter->andEqual($model->schedulerId, $schedulerId);

        $count = new SchedulerLogCount();
        $count->filter = $filter;

        $p = new Paragraph($this);
        $p->content = $count->getCount() . ' Log found';


        $table = new AdminTable($this);

        $header = new AdminTableHeader($table);
        $header->addText('Status');
        $header->addText('Planned Date/Time');
        $header->addText('Running Date/Time');
        $header->addText('Duration');

        $logReader = new SchedulerLogPaginationReader();
        $logReader->model->loadSchedulerStatus();
        $logReader->filter = $filter;
        $logReader->addOrder($logReader->model->plannedDateTime, SortOrder::DESCENDING);
        $logReader->paginationLimit = 100;

        foreach ($logReader->getData() as $logRow) {

            $row = new AdminTableRow($table);
            $row->addText($logRow->schedulerStatus->schedulerStatus);
            $row->addText($logRow->plannedDateTime->getShortDateTimeLeadingZeroFormat());

            if ($logRow->schedulerStatusId != (new PlannedSchedulerStatus())->id && $logRow->schedulerStatusId != (new ChanceledSchedulerStatus())->id) {
                $row->addText($logRow->runningDateTime->getShortDateTimeLeadingZeroFormat());
            } else {
                $row->addEmpty();
            }

            $row->addText($logRow->duration . ' sec');

        }

        $pagination = new AdminPagination($this);
        $pagination->paginationReader = $logReader;

        return parent::getContent();

    }

}