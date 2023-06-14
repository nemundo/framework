<?php

namespace Nemundo\App\SystemLog\Scheduler;

use Nemundo\App\Mail\Com\Table\MailTable;
use Nemundo\App\Mail\Com\Table\MailTableHeader;
use Nemundo\App\Mail\Message\Mail\ActionMailMessage;
use Nemundo\App\Scheduler\Job\AbstractScheduler;
use Nemundo\App\SystemLog\Data\Log\LogUpdate;
use Nemundo\App\SystemLog\Reader\LogDataReader;
use Nemundo\App\SystemLog\Usergroup\SystemLogUsergroup;
use Nemundo\Com\TableBuilder\TableRow;

class SystemLogMailScheduler extends AbstractScheduler
{
    protected function loadScheduler()
    {

        $this->active = true;
        $this->minute = 30;

        $this->consoleScript = true;
        $this->scriptName = 'systemlog-mail';

    }

    public function run()
    {

        $logTable = new MailTable();


        $reader = new LogDataReader();
        $reader->filter->andEqual($reader->model->sendMail, false);

        $header = new MailTableHeader($logTable);
        $header->addText($reader->model->application->label);
        $header->addText($reader->model->logType->label);
        $header->addText($reader->model->message->label);
        $header->addText($reader->model->dateTime->label);

        foreach ($reader->getData() as $logRow) {

            $row = new TableRow($logTable);
            $row->addText($logRow->application->application);
            $row->addText($logRow->logType->logType);
            $row->addText($logRow->message);
            $row->addText($logRow->dateTime->getShortDateTimeLeadingZeroFormat());

        }


        $update = new LogUpdate();
        $update->sendMail = true;
        $update->update();


        foreach ((new SystemLogUsergroup())->getUserList() as $userRow) {

            $mail = new ActionMailMessage();
            $mail->mailTo = $userRow->email;
            $mail->subject = 'System Log';
            $mail->mailContainer->mailTitle = 'System Log';
            $mail->mailContainer->mailDiv->addContainer($logTable);
            $mail->sendMail();

        }


    }
}