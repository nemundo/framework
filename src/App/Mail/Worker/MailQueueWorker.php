<?php

namespace Nemundo\App\Mail\Worker;

use Nemundo\App\Mail\Config\MailConfigLoader;
use Nemundo\App\Mail\Data\InlineImage\InlineImageReader;
use Nemundo\App\Mail\Data\MailQueue\MailQueueReader;
use Nemundo\App\Mail\Data\MailQueue\MailQueueUpdate;
use Nemundo\App\Mail\Message\Attachment\InlineImageAttachment;
use Nemundo\App\Mail\Message\Smtp\SmtpMailMessage;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\DateTime\DateTime;

class MailQueueWorker extends AbstractBase
{

    public function sendQueue() {

        (new MailConfigLoader())->loadConfig();

        $mailQueueReader = new MailQueueReader();
        $mailQueueReader->filter->andEqual($mailQueueReader->model->send, false);
        foreach ($mailQueueReader->getData() as $queueRow) {

            $mail = new SmtpMailMessage();
            $mail->addTo($queueRow->mailTo);
            $mail->subject = $queueRow->subject;
            $mail->htmlMail = true;
            $mail->text = $queueRow->text;

            $inlineImageReader = new InlineImageReader();
            $inlineImageReader->filter->andEqual($inlineImageReader->model->mailQueueId, $queueRow->id);
            foreach ($inlineImageReader->getData() as $inlineImageRow) {

                $inlineImage = new InlineImageAttachment();
                $inlineImage->cid = $inlineImageRow->cid;
                $inlineImage->filename = $inlineImageRow->filename;

                $mail->addInlineImage($inlineImage);

            }


            $mail->sendMail();

            $update = new MailQueueUpdate();
            $update->send = true;
            $update->dateTimeSend = (new DateTime())->setNow();
            $update->updateById($queueRow->id);

        }


    }

}