<?php

namespace Nemundo\App\Mail\Worker;

use Nemundo\App\Mail\Connection\SmtpConnection;
use Nemundo\App\Mail\Data\Attachment\AttachmentReader;
use Nemundo\App\Mail\Data\InlineImage\InlineImageReader;
use Nemundo\App\Mail\Data\MailQueue\MailQueueUpdate;
use Nemundo\App\Mail\Message\Attachment\InlineImageAttachment;
use Nemundo\App\Mail\Message\Smtp\SmtpMailMessage;
use Nemundo\App\Mail\Reader\MailQueue\MailQueueDataReader;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\DateTime\DateTime;

class MailQueueWorker extends AbstractBase
{

    public function sendQueue()
    {

        $mailQueueReader = new MailQueueDataReader();
        $mailQueueReader->filter->andEqual($mailQueueReader->model->send, false);
        foreach ($mailQueueReader->getData() as $queueRow) {

            $connection = new SmtpConnection();
            $connection->host = $queueRow->mailServer->host;
            $connection->port = $queueRow->mailServer->port;
            $connection->authentication = $queueRow->mailServer->authentication;
            $connection->user = $queueRow->mailServer->user;
            $connection->password = $queueRow->mailServer->password;
            $connection->mailFrom = $queueRow->mailServer->mailAddress;
            $connection->mailFromText = $queueRow->mailServer->mailText;

            $mail = new SmtpMailMessage();
            $mail->connection = $connection;
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

            $attachmentReader = new AttachmentReader();
            $attachmentReader->filter->andEqual($attachmentReader->model->mailQueueId, $queueRow->id);
            foreach ($attachmentReader->getData() as $attachmentRow) {

                $customFilename = null;
                if ($attachmentRow->hasCustomFilename) {
                    $customFilename = $attachmentRow->customFilename;
                }

                $mail->addAttachment($attachmentRow->filename, $customFilename);

            }

            $mail->sendMail();

            $update = new MailQueueUpdate();
            $update->send = true;
            $update->dateTimeSend = (new DateTime())->setNow();
            $update->updateById($queueRow->id);

        }

    }

}