<?php

namespace Nemundo\App\Notification\Builder;

use Nemundo\App\Mail\Message\Mail\ActionMailMessage;
use Nemundo\App\Notification\Data\Notification\Notification;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\User\Usergroup\AbstractUsergroup;

class NotificationBuilder extends AbstractBase
{


    public function sendNotification(AbstractUsergroup $usergroup, $message) {


        foreach ($usergroup->getUserList() as $userRow) {

            $data = new Notification();
            $data->userId = $userRow->id;
            $data->dateTime = (new DateTime())->setNow();
            $data->message = $message;
            $data->save();

            $mail = new ActionMailMessage();
            $mail->mailTo = $userRow->email;
            $mail->subject = 'Notification';
            $mail->mailContainer->mailText = $message;
            $mail->sendMail();

        }

        return $this;


    }



}